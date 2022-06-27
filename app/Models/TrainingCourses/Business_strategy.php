<?php

namespace App\Models\TrainingCourses;

use Illuminate\Database\Eloquent\Model;

class Business_strategy extends Model
{
    protected $table = "business_strategies";

    protected $fillable = [
        'business_strategy_course_name',
        'business_strategy_course_description',
        'business_strategy_course_price',
        'business_strategy_course_teacher_name',
        'image',
    ];
}
