<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;

class DynamicFacade extends Facade{


    protected static function getFacadeAccessor()
    {
        return 'domain\DynamicService';  
    }

}