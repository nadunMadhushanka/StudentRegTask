<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use DB;

class DynamicController extends Controller
{
    //select dopdown options for each category

    public function findCourseNames($cat_id){
    

        echo json_encode(DB::table('courses')->where('cat_id', $cat_id)->get());
    }
}
