<?php

namespace App\Models\ProfessionalEnglish;

use Illuminate\Database\Eloquent\Model;

class English_Media extends Model
{
    protected $table = "english__media";

    protected $fillable = [
        'english_media_course_name',
        'english_media_course_description',
        'english_media_course_price',
        'english_media_course_teacher_name',
        'image',
    ];
}
