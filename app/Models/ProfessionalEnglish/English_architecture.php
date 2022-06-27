<?php

namespace App\Models\ProfessionalEnglish;

use Illuminate\Database\Eloquent\Model;

class English_architecture extends Model
{
    protected $table = "english_architectures";

    protected $fillable = [
        'english_architecture_course_name',
        'english_architecture_course_description',
        'english_architecture_course_price',
        'english_architecture_course_teacher_name',
        'image',
    ];
}
