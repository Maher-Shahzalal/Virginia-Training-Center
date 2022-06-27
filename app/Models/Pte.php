<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pte extends Model
{
    protected $table = "ptes";

    protected $fillable = [
        'pte_course_name',
        'pte_course_description',
        'pte_course_price',
        'pte_course_teacher_name',
        'image',
    ];
}
