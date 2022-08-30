<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCaurseRequest;
use domain\Facades\CaurseFacade;

class CourseController extends Controller
{
    //adding courses to the courses table;
    public function store(CreateCaurseRequest $request){

        $input = $request->all();
        CaurseFacade::store($input);
        return redirect('home');
    }
}
