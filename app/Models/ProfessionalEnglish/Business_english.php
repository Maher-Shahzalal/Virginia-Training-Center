<?php

namespace App\Models\ProfessionalEnglish;

use Illuminate\Database\Eloquent\Model;

class Business_english extends Model
{
    protected $table = "business_englishes";

    protected $fillable = [
        'business_english_course_name',
        'business_english_course_description',
        'business_english_course_price',
        'business_english_course_teacher_name',
        'image',
    ];
}
