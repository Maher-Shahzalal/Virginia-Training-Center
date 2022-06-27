<?php

namespace App\Models\ProfessionalEnglish;

use Illuminate\Database\Eloquent\Model;

class English_it extends Model
{
    protected $table = "english_its";

    protected $fillable = [
        'english_it_course_name',
        'english_it_course_description',
        'english_it_course_price',
        'english_it_course_teacher_name',
        'image',
    ];
}
