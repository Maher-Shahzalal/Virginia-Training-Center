<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class Innovation extends Model
{
    protected $table = "innovations";

    protected $fillable = [
        'innovation_course_name',
        'innovation_course_description',
        'innovation_course_price',
        'innovation_course_teacher_name',
        'image',
    ];
}
