<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class Management_Leadership extends Model
{
    protected $table = "management__leaderships";

    protected $fillable = [
        'management_leadership_course_name',
        'management_leadership_course_description',
        'management_leadership_course_price',
        'management_leadership_course_teacher_name',
        'image',
    ];
}
