<?php

namespace App\Models\ProfessionalEnglish;

use Illuminate\Database\Eloquent\Model;

class English_Diplomatic extends Model
{
    protected $table = "english__diplomatics";

    protected $fillable = [
        'english_diplomatic_course_name',
        'english_diplomatic_course_description',
        'english_diplomatic_course_price',
        'english_diplomatic_course_teacher_name',
        'image',
    ];
}
