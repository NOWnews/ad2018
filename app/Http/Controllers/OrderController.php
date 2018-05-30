<?php

namespace AD2018\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the order dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.home');
    }

    public function createView()
    {
        return view('order.create');
    }

    public function createOrder()
    {
        return view('order.create');
    }
}
