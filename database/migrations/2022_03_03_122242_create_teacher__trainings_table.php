<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher__trainings', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_training_course_name');
            $table->string('teacher_training_course_description');
            $table->string('teacher_training_course_price');
            $table->string('teacher_training_course_teacher_name');
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
        Schema::dropIfExists('teacher__trainings');
    }
}
