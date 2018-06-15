<?php

namespace AD2018\Http\Controllers;


use AD2018\Http\Services\CreativeService;
use AD2018\Model\Creative;
use AD2018\Model\Inventory;
use AD2018\Model\Order;
use Illuminate\Http\Request;
class CreativeController extends Controller
{
    public function __construct(CreativeService $creativeService)
    {
        $this->middleware('auth');
        $this->creativeService = $creativeService;
    }

    /**
     * Show the order dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request) {
        $creativieSet = Creative::all()->sortByDesc("id");
        if (!$creativieSet) {
            $creativieSet = [];
        }

        return view('creative.home', ['creativeSet' => $creativieSet]);
    }

    public function createView(Request $request, $orderId) {
        $order = Order::where(["id" => $orderId])->get();
        $inventories = Inventory::all();
        return view('creative.create', ['order' => $order[0],
                                            'inventories' => $inventories]);
    }

    public function editView(Request $request, $creativeId) {
        $creative = $this->creativeService->getCreative($creativeId);
        $order = $creative->order;
        $inventories = Inventory::all();
        return view('creative.edit', ['creative' => $creative,
                                            'order' => $order,
                                            'inventories' => $inventories]);
    }

    public function createCreative(Request $request) {
        $result = $this->creativeService->createCreative($request->input(), $request->file('image'));
        if ($result === true) {
            return redirect('order/' . array_get($request->input(), 'orderId'));
        } else {
            $errorMsg = '發生錯誤：'.$result->getMessage();
            return redirect()->back()->withErrors([$errorMsg])->withInput();
        }
    }

    public function updateCreative(Request $request) {
        $result = $this->creativeService->updateCreative($request->input(), $request->file('image'));
        if ($result === true) {
            return redirect('order/' . array_get($request->input(), 'orderId'));
        } else {
            $errorMsg = '發生錯誤：'.$result->getMessage();
            return redirect()->back()->withErrors([$errorMsg])->withInput();
        }
    }

    public function creativeDetail(Request $request, $id) {
        $creative = $this->creativeService->getCreative($id);
        return view('creative.detail', ['creative' => $creative]);
    }

    public function updateStatus(Request $request, $id, $status) {
        if ($status === "0") {
            $this->creativeService->updateStatus($id, false);
        } else {
            $this->creativeService->updateStatus($id, true);
        }
        return redirect()->back();
    }

}
