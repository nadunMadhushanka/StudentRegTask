<?php

namespace domain;
use App\Models\Course;

class CaurseService
{

// create a new course
    public function store($input){
        Course::create($input);
    }
//get all the courses
    public function getCaurse(){
       $course = Course::all();
       return $course;
    }
}