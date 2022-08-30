<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'duration','cat_id']; 


    static function find_course($cat_id){
        $course = self::where('cat_id', $cat_id)->get();
        return $course;
    }
}
