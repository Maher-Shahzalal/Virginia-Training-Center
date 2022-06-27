<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class HR extends Model
{
    protected $table = "h_r_s";

    protected $fillable = [
        'hr_course_name',
        'hr_course_description',
        'hr_course_price',
        'hr_course_teacher_name',
        'image',
    ];
}
