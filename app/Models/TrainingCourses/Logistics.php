<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class Logistics extends Model
{
    protected $table = "logistics";

    protected $fillable = [
        'logistics_course_name',
        'logistics_course_description',
        'logistics_course_price',
        'logistics_course_teacher_name',
        'image',
    ];
}
