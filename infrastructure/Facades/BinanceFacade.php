<?php

namespace infrastructure\Facades;

use Illuminate\Support\Facades\Facade;

class BinanceFacade extends Facade{


    protected static function getFacadeAccessor()
    {
        return 'infrastructure\BinanceService';  
    }

}