<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class Teacher_Training extends Model
{
    protected $table = "teacher__trainings";

    protected $fillable = [
        'teacher_training_course_name',
        'teacher_training_course_description',
        'teacher_training_course_price',
        'teacher_training_course_teacher_name',
        'image',
    ];
}
