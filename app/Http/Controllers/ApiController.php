<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use infrastructure\Facades\BinanceFacade;
use infrastructure\Facades\SendMailFacade;


class ApiController extends Controller
{
    //cahnge the route to change leverage
    public function changeLeverageRoute(){
        $result = [];
        return view('levChange')->with('result',$result);
    }

    //change the leverage
    public function changeLeverage(Request $request){
        $input = $request->all();
       $result =  BinanceFacade::changeLeverage($input);
       return view('levChange')->with('result',$result);
    }


    //place order for buying coins
    public function placeOrder(Request $request){
        $input = $request->all();
       $data =  BinanceFacade::placeOrder($input); 
       SendMailFacade::sendMail($data);
       
    }


    //place order for selling coins
    public function sellCoins(Request $request){
        $input = $request->all();
        BinanceFacade::sellCoins($input);
        
    }


    
}
