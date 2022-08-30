<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use infrastructure\Facades\BybitFacade;

class BybitController extends Controller
{

//change the route to bybit section
     public function changeRoute()
    {
        return view('bybit');
    } 

// place the order with bybit
    public function placeOrder(){
        BybitFacade::placeOrder();
    }

//sell coins usin the bybit
    public function selCoins(){
        BybitFacade::selCoins();
    }

}
