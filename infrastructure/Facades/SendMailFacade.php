<?php

namespace infrastructure\Facades;

use Illuminate\Support\Facades\Facade;

class SendMailFacade extends Facade{


    protected static function getFacadeAccessor()
    {
        return 'infrastructure\SendMailService';  
    }


}