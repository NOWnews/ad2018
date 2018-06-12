<?php

namespace AD2018\Http\Services;

use AD2018\Model\Order;

class OrderService
{
    public function __construct()
    {

    }

    public function createOrder ($param) {
        $order = new Order();
        $order->no = $param['no'];
        $order->name = $param['order_name'];
        $order->salesperson = $param['salesperson'];
        try{
            $result = $order->save();
            return $result;
        } catch (\Exception $exception) {
            return $exception;
        }

    }

    public function updateOrder ($param) {
        $order = Order::where(["id" => $param['id']])->get()->first();
        $order->no = $param['no'];
        $order->name = $param['order_name'];
        $order->salesperson = $param['salesperson'];
        return $order->save();
    }

    public function getOrder ($id) {
        return Order::where(["id" => $id])->get()->first();
    }
}
