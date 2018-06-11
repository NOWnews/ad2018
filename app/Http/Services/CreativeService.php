<?php

namespace AD2018\Http\Services;

use AD2018\Model\Creative;
use Illuminate\Support\Facades\Storage;

class CreativeService
{
    public function __construct()
    {

    }

    public function createCreative ($param, $image) {
        $imagePath = '';
        if ($image) {
            $imagePath = $image->store('public/images');
        }
        $creative = new Creative();
        $creative->order_id = $param['orderId'];
        $creative->inventory_id = $param['inventoryId'];
        $creative->name = $param['name'];
        $creative->status = $param['status'];
        $creative->type = $param['type'];
        $creative->title = $param['title'];
        $creative->image = Storage::url($imagePath);
        $creative->link = $param['link'];
        try{
            $result = $creative->save();
            return $result;
        } catch (\Exception $exception) {
            return $exception;
        }

    }

    public function updateStatus ($id, $status) {
        $creative = Creative::where(['id' => $id])->get()->first();
        $creative->status = $status;
        return $creative->save();
    }


}
