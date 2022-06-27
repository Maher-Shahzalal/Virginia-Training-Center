<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professional_English extends Model
{
    protected $table = "professional__englishes";

    protected $fillable = [
        'professional_english_course_name',
        'professional_english_course_description',
        'professional_english_course_price',
        'professional_english_course_teacher_name',
        'image',
    ];
}
