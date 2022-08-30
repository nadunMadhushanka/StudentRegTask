<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\Category;
use App\Models\Course;
use App\Http\Requests\CreateStudentCourse;
use App\Http\Requests\CreateStusentRequest;
use domain\Facades\StudentFacade;

class StudentController extends Controller
{
    //adding student datails to the student table
    public function store(CreateStusentRequest $request){
        $input = $request->all();
        StudentFacade::store($input);
        return redirect('home');
    }

    //add courses to students
    public function storeCourses(CreateStudentCourse $request){
        $input = $request->all();
        StudentFacade::storeCourses($input);
        return redirect('home');
    }

    
   
}
