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
