<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class Business_ethics extends Model
{
    protected $table = "business_ethics";

    protected $fillable = [
        'business_ethics_course_name',
        'business_ethics_course_description',
        'business_ethics_course_price',
        'business_ethics_course_teacher_name',
        'image',
    ];
}
