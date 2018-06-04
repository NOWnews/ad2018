<?php

namespace AD2018\Http\Controllers;

use AD2018\Http\Services\OrderService;
use AD2018\Model\Creative;
use AD2018\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CreativeController extends Controller
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
    public function list(Request $request)
    {
        $creativieSet = [];
        $creativieSetQuery = Creative::find(1);
        if ($creativieSetQuery) {
            $creativieSet = $creativieSetQuery->get();
        }

        return view('creative.home', ['creativeSet' => $creativieSet]);
    }
}
