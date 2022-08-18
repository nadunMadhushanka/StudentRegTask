<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\CreateCaurseRequest;

class CourseController extends Controller
{
    //adding courses to the courses table;
    public function store(CreateCaurseRequest $request){
       
        $input = $request->all();
        Course::create($input);
        return redirect('home')->with('flash_message', 'Student Addedd!');
    }
}
