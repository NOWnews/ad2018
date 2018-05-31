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
    public function index(Request $request)
    {
        $orders = Order::find(1)->get();
        return view('order.home', ['orders' => $orders]);
    }

    public function createView(Request $request)
    {
        return view('order.create');
    }

    public function orderDetail(Request $request, $id)
    {
        $order = Order::where(['id' => $id])->get()->first();
        return view('order.detail', ['order' => $order]);
    }

    public function createOrder(Request $request)
    {
        $result = $this->orderService->createOrder($request->input());
        if ($result === true) {
            return redirect('order');
        } else {
            $errorMsg = '發生錯誤：'.$result->getMessage();
            return redirect()->back()->withErrors([$errorMsg])->withInput();
//            return Redirect::route('order.create.form')->with( ['error' => $result] );
//            return redirect('order/create', ['error' => $result]);TEST002
        }
    }
}
