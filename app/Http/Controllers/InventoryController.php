<?php

namespace AD2018\Http\Controllers;

use AD2018\Http\Services\InventoryService;
use AD2018\Model\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function __construct(InventoryService $inventoryService)
    {
        $this->middleware('auth');
        $this->inventoryService = $inventoryService;
    }

    /**
     * Show the inventory dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request) {
        $inventories = [];
        $inventoriesQuery = Inventory::find(1);
        if ($inventoriesQuery) {
            $inventories = $inventoriesQuery->get();
        }

        return view('inventory.home', ['inventories' => $inventories]);
    }
    public function createView(Request $request) {
        return view('inventory.create');
    }

    public function createInventory(Request $request) {
        $result = $this->inventoryService->createInventry($request->input());
        if ($result === true) {
            return redirect('inventory');
        } else {
            $errorMsg = '發生錯誤：'.$result->getMessage();
            return redirect()->back()->withErrors([$errorMsg])->withInput();
        }
    }

}
