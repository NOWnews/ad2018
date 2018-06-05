<?php

namespace AD2018\Http\Services;

use AD2018\Model\Creative;

class CreativeService
{
    public function __construct()
    {

    }

    public function createCreative ($param) {
        $creative = new Creative();
        $creative->order_id = $param['orderId'];
        $creative->inventory_id = $param['inventoryId'];
        $creative->type = $param['type'];
        $creative->title = $param['title'];
        $creative->image = $param['image'];
        $creative->link = $param['link'];
        try{
            $result = $creative->save();
            return $result;
        } catch (\Exception $exception) {
            return $exception;
        }

    }
}
