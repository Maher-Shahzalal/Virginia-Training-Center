<?php

namespace App\Models\ProfessionalEnglish;

use Illuminate\Database\Eloquent\Model;

class English_army extends Model
{
    protected $table = "english_armies";

    protected $fillable = [
        'english_army_course_name',
        'english_army_course_description',
        'english_army_course_price',
        'english_army_course_teacher_name',
        'image',
    ];
}
