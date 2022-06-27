<?php

namespace App\Models\ProfessionalEnglish;

use Illuminate\Database\Eloquent\Model;

class English_legal extends Model
{
    protected $table = "english_legals";

    protected $fillable = [
        'english_legal_course_name',
        'english_legal_course_description',
        'english_legal_course_price',
        'english_legal_course_teacher_name',
        'image',
    ];
}
