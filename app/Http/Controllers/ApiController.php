<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use infrastructure\Facades\BinanceFacade;
use infrastructure\Facades\BinanceFacade;

class ApiController extends Controller
{




    //cahnge the route to change leverage
    public function changeLeverageRoute(){
        $result = [];
        return view('levChange')->with('result',$result);
    }

    //change the leverage
    public function changeLeverage(Request $request){
       $result =  BinanceFacade::changeLeverage($request);

       return view('levChange')->with('result',$result);
    }


    //place order for buying coins
    public function placeOrder(Request $request){
        BinanceFacade::placeOrder($request);
    }


    //place order for selling coins
    public function sellCoins(Request $request){
        BinanceFacade::sellCoins($request);
    }

    
}
