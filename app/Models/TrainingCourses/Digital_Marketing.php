<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class Digital_Marketing extends Model
{
    protected $table = "digital__marketings";

    protected $fillable = [
        'digital_marketing_course_name',
        'digital_marketing_course_description',
        'digital_marketing_course_price',
        'digital_marketing_course_teacher_name',
        'image',
    ];
}
