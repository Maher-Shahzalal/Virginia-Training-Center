<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class NGO extends Model
{
    protected $table = "n_g_o_s";

    protected $fillable = [
        'ngo_course_name',
        'ngo_course_description',
        'ngo_course_price',
        'ngo_course_teacher_name',
        'image',
    ];
}
