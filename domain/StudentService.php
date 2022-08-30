<?php


namespace domain;



use App\Models\Student;

use App\Models\StudentCourse;




class StudentService
{
        //adding student datails to the student table
        public function store($input){
            Student::create($input);
            
        }
        // get all the students in system
        public function getStudent(){
            $student = Student::all();
            return $student;
        }

        //store cources with students
        public function storeCourses($input){

            $studentCourse = new StudentCourse();
            $studentCourse->student_id = $input['s_id'];
            $studentCourse->course_id = $input['c_id'];
            $studentCourse->save();
    
        }
    


}