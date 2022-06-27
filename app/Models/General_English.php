<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class General_English extends Model
{
    protected $table = "general__englishes";

    protected $fillable = [
        'general_english_course_name',
        'general_english_course_description',
        'general_english_course_price',
        'general_english_course_teacher_name',
        'image',
    ];
}
