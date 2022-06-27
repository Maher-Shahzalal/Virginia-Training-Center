<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    protected $table = "marketings";

    protected $fillable = [
        'marketing_course_name',
        'marketing_course_description',
        'marketing_course_price',
        'marketing_course_teacher_name',
        'image',
    ];
}
