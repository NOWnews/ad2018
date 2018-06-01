<?php

namespace AD2018\Http\Controllers;

use AD2018\Model\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the inventory dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $inventories = [];
        $inventoriesQuery = Inventory::find(1);
        if ($inventoriesQuery) {
            $inventories = $inventoriesQuery->get();
        }

        return view('inventory.home', ['inventories' => $inventories]);
    }

}
