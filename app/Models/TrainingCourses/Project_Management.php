<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class Project_Management extends Model
{
    protected $table = "project__management";

    protected $fillable = [
        'project_management_course_name',
        'project_management_course_description',
        'project_management_course_price',
        'project_management_course_teacher_name',
        'image',
    ];
}
