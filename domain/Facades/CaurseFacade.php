<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;

class CaurseFacade extends Facade{


    protected static function getFacadeAccessor()
    {
        return 'domain\CaurseService';  
    }

}