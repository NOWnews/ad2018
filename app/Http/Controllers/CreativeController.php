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
        $creativieSet = [];
        $creativieSetQuery = Creative::find(1);
        if ($creativieSetQuery) {
            $creativieSet = $creativieSetQuery->get();
        }

        return view('creative.home', ['creativeSet' => $creativieSet]);
    }

    public function createView(Request $request, $orderId) {
        $order = Order::find($orderId)->get();
        $inventories = Inventory::all();
        return view('creative.create', ['order' => $order[0],
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

    public function creativeDetail(Request $request, $id) {
        $creative = Creative::where(['id' => $id])->get()->first();
        return view('creative.detail', ['creative' => $creative]);
    }
}
