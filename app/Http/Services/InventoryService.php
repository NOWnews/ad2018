<?php

namespace AD2018\Http\Services;

use AD2018\Model\Inventory;

class InventoryService
{
    public function __construct()
    {

    }

    public function createInventry ($param) {
        $inventory = new Inventory();
        $inventory->position = $param['position'];
        $inventory->name = $param['name'];
        $inventory->type = $param['type'];
        $inventory->desc = $param['desc'];
        try{
            $result = $inventory->save();
            return $result;
        } catch (\Exception $exception) {
            return $exception;
        }

    }

    public function updateInventry ($param) {
        $inventory = Inventory::where(["id"=> $param['id']])->get()->first();
        $inventory->position = $param['position'];
        $inventory->name = $param['name'];
        $inventory->type = $param['type'];
        $inventory->desc = $param['desc'];
        try{
            $result = $inventory->save();
            return $result;
        } catch (\Exception $exception) {
            return $exception;
        }

    }
}
