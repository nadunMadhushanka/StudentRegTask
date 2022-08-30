<?php

namespace infrastructure;

use infrastructure\Facades\BybitApiFacade;
use infrastructure\Facades\BybitFacade;

class BybitService
{

    //make order to buy coins
    function placeOrder()
    {
    


    $params = [
        'symbol' => 'BTCUSDT', 
        'side' => 'Buy', 
        'order_type' => 'Market', 
        'qty' => '0.05', 
        //'price' => '500', 
        'time_in_force' => 'GoodTillCancel',
        'reduce_only' => false,
        'close_on_trigger' => false,
        'timestamp' => time() * 1000,
        
    ];

    BybitApiFacade::signedRequest($params);



}


//make order to sell coins

public function selCoins()
    {
        $params = [
            'symbol' => 'BTCUSDT', 
            'side' => 'Sell', 
            'order_type' => 'Market', 
            'qty' => '0.05', 
            //'price' => '30', 
            'time_in_force' => 'GoodTillCancel',
            'reduce_only' => false,
            'close_on_trigger' => false,
            'timestamp' => time() * 1000,
            
        ];

        BybitApiFacade::signedRequest($params);
    
    }
}
