<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class Professional_Development extends Model
{
    protected $table = "professional__developments";

    protected $fillable = [
        'professional_development_course_name',
        'professional_development_course_description',
        'professional_development_course_price',
        'professional_development_course_teacher_name',
        'image',
    ];
}
