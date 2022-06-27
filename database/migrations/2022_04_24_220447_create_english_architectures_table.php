<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnglishArchitecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('english_architectures', function (Blueprint $table) {
            $table->id();
            $table->string('english_architecture_course_name');
            $table->string('english_architecture_course_description');
            $table->string('english_architecture_course_price');
            $table->string('english_architecture_course_teacher_name');
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
        Schema::dropIfExists('english_architectures');
    }
}
