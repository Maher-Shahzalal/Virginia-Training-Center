<?php

namespace App\Models\ProfessionalEnglish;

use Illuminate\Database\Eloquent\Model;

class English_banking extends Model
{
    protected $table = "english_bankings";

    protected $fillable = [
        'english_banking_course_name',
        'english_banking_course_description',
        'english_banking_course_price',
        'english_banking_course_teacher_name',
        'image',
    ];
}
