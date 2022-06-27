<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class Social_Media extends Model
{
    protected $table = "social__media";

    protected $fillable = [
        'social_media_course_name',
        'social_media_course_description',
        'social_media_course_price',
        'social_media_course_teacher_name',
        'image',
    ];
}
