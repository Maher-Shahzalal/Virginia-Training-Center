<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalEnglishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional__englishes', function (Blueprint $table) {
            $table->id();
            $table->string('professional_english_course_name');
            $table->string('professional_english_course_description');
            $table->string('professional_english_course_price');
            $table->string('professional_english_course_teacher_name');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professional__englishes');
    }
}
