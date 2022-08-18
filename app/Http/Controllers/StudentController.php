<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\Category;
use App\Models\Course;
use App\Http\Requests\CreateStudentCourse;
use App\Http\Requests\CreateStusentRequest;


class StudentController extends Controller
{
    //adding student datails to the student table
    public function store(CreateStusentRequest $request){
       

        $input = $request->all();
        Student::create($input);
        return redirect('home');
    }


    //add courses to students

    public function storeCourses(CreateStudentCourse $request){

        
        $input = $request->all();
        //dd($input);

        
        

        $studentCourse = new StudentCourse();

        $studentCourse->student_id = $input['s_id'];
        $studentCourse->course_id = $input['c_id'];

        $studentCourse->save();
        return redirect('home');





    }

    
   
}
