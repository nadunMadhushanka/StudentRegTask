<?php

namespace infrastructure\Facades;

use Illuminate\Support\Facades\Facade;

class BinanceApiFacades extends Facade{


    protected static function getFacadeAccessor()
    {
        return 'infrastructure\BinanceApiService';  
    }


}