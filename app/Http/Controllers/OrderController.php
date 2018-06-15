<?php

namespace AD2018\Http\Controllers;

use AD2018\Http\Services\OrderService;
use AD2018\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function __construct(OrderService $orderService)
    {
        $this->middleware('auth');
        $this->orderService = $orderService;
    }

    /**
     * Show the order dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $orders = Order::all()->sortByDesc("id");
        if (!$orders) {
            $orders = [];
        }

        return view('order.home', ['orders' => $orders]);
    }

    public function searchOrder(Request $request)
    {
        $keyword = $request->input("keyword");
        $orders = [];
        $ordersQuery = Order::where("name", "like", '%' . $keyword . '%');
        if ($ordersQuery) {
            $orders = $ordersQuery->get();
        }

        return view('order.home', ['orders' => $orders]);
    }

    public function createView(Request $request)
    {
        return view('order.create');
    }

    public function editView(Request $requestm, $orderId) {
        $order = $this->orderService->getOrder($orderId);
        return view('order.edit', ['order' => $order]);
    }

    public function orderDetail(Request $request, $id)
    {
        $order = Order::where(['id' => $id])->get()->first();
        $creativeSet = $order->creative()->get()->sortByDesc("id");
        return view('order.detail', ['order' => $order,
                                            'creativeSet' => $creativeSet]);
    }

    public function createOrder(Request $request)
    {
        $result = $this->orderService->createOrder($request->input());
        if ($result === true) {
            return redirect('order');
        } else {
            $errorMsg = '發生錯誤：'.$result->getMessage();
            return redirect()->back()->withErrors([$errorMsg])->withInput();
        }
    }

    public function updateOrder(Request $request)
    {
        $result = $this->orderService->updateOrder($request->input());
        if ($result === true) {
            return redirect('order');
        } else {
            $errorMsg = '發生錯誤：'.$result->getMessage();
            return redirect()->back()->withErrors([$errorMsg])->withInput();
        }
    }
}
