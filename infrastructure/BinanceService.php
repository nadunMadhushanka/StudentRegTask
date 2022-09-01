<?php


namespace infrastructure;

use App\Mail\NoticeMail;
use Illuminate\Support\Facades\Mail;
use infrastructure\Facades\BinanceApiFacades;
use PHPUnit\Framework\MockObject\Rule\Parameters;

use function PHPUnit\Framework\isNull;

class BinanceService {


    //change the leverage
    public function changeLeverage($input){
        
        $leverage = $input['leverage'];

       $parameters['leverage'] = $leverage;
       $parameters['symbol'] = "BTCUSDT";
        $method = "POST";
        $path = "/fapi/v1/leverage";
       return BinanceApiFacades::signedRequest($path,$method,$parameters);   
    }


    //place order for buying coins
    public function placeOrder($input){
        //dd($input['price']);
        $parameters['type'] = "MARKET";
        $parameters['symbol'] = "BTCUSDT";
        $parameters['side'] = "BUY";
        //$parameters['price'] = $input['price'];
        $parameters['quantity'] = $input['ammount'];
        $parameters['callbackRate'] = 1;
        //$parameters['timeInForce'] = "GTC";
        //$parameters['stopPrice'] = 11681.67;		
        $method = "POST";
        $path = "/fapi/v1/order";
       
        $result = BinanceApiFacades::signedRequest($path,$method,$parameters);
        var_dump($result->symbol);
       if(empty($result->symbol)){
        return;
       }else{
        return $result->symbol;
       }
        
        // dd($result);
    }


    //place order for selling coins
    public function sellCoins($input){
        //dd($input['price']);
        $parameters['type'] = "MARKET";
        $parameters['symbol'] = "BTCUSDT";
        $parameters['side'] = "SELL";
        //$parameters['price'] = $input['price'];
        $parameters['quantity'] = $input['ammount'];
        $parameters['callbackRate'] = 1;
        //$parameters['timeInForce'] = "GTC";
        //$parameters['stopPrice'] = 11681.67;		
        $method = "POST";
        $path = "/fapi/v1/order";
       
        $result = BinanceApiFacades::signedRequest($path,$method,$parameters);
        var_dump($result);
        return $result->symbol;
        
    }


    public function getWalletBallence()
    {

        $method = "GET";
        $path = "/fapi/v2/balance";
        

        $balance = BinanceApiFacades::signedRequest($path, $method, $parameters = []);
        return $balance;
    }

    

}