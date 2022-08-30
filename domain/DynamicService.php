<?php
 namespace domain;

use App\Models\Course;

 class DynamicService{

    //select dopdown options for each category

    public function findCourseNames($cat_id){

        $course = Course::find_course($cat_id);
        echo json_encode($course);
    }

 }