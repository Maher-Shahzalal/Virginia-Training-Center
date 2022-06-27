<?php

namespace App\Models\ProfessionalEnglish;

use Illuminate\Database\Eloquent\Model;

class English_insurance extends Model
{
    protected $table = "english_insurances";

    protected $fillable = [
        'english_insurance_course_name',
        'english_insurance_course_description',
        'english_insurance_course_price',
        'english_insurance_course_teacher_name',
        'image',
    ];
}
