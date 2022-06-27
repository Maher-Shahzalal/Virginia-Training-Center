<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ielts extends Model
{
    protected $table = "ielts";

    protected $fillable = [
        'ielts_course_name',
        'ielts_course_description',
        'ielts_course_price',
        'ielts_course_teacher_name',
        'image',
    ];
}
