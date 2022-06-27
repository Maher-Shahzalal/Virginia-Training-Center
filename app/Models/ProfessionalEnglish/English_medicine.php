<?php

namespace App\Models\ProfessionalEnglish;

use Illuminate\Database\Eloquent\Model;

class English_medicine extends Model
{
    protected $table = "english_medicines";

    protected $fillable = [
        'english_medicine_course_name',
        'english_medicine_course_description',
        'english_medicine_course_price',
        'english_medicine_course_teacher_name',
        'image',
    ];
}
