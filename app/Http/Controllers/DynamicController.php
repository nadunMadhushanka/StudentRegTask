<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use DB;
use domain\Facades\DynamicFacade;

class DynamicController extends Controller
{
    //select dopdown options for each category
    public function findCourseNames($cat_id){
        DynamicFacade::findCourseNames($cat_id);
    }
}
