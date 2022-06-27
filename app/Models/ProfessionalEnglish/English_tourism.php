<?php

namespace App\Models\ProfessionalEnglish;

use Illuminate\Database\Eloquent\Model;

class English_tourism extends Model
{
    protected $table = "english_tourisms";

    protected $fillable = [
        'english_tourism_course_name',
        'english_tourism_course_description',
        'english_tourism_course_price',
        'english_tourism_course_teacher_name',
        'image',
    ];
}
