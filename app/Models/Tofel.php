<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tofel extends Model
{
    protected $table = "tofels";

    protected $fillable = [
        'tofel_course_name',
        'tofel_course_description',
        'tofel_course_price',
        'tofel_course_teacher_name',
        'image'
    ];
}
