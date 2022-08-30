<?php

namespace domain\Facades;

use Illuminate\Support\Facades\Facade;

class CategoryFacade extends Facade{


    protected static function getFacadeAccessor()
    {
        return 'domain\CategoryService';  
    }

}