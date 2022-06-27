<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class Entrepreneurship extends Model
{
    protected $table = "entrepreneurships";

    protected $fillable = [
        'entrepreneurship_course_name',
        'entrepreneurship_course_description',
        'entrepreneurship_course_price',
        'entrepreneurship_course_teacher_name',
        'image',
    ];
}
