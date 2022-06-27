<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrepreneurshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrepreneurships', function (Blueprint $table) {
            $table->id();
            $table->string('entrepreneurship_course_name');
            $table->string('entrepreneurship_course_description');
            $table->string('entrepreneurship_course_price');
            $table->string('entrepreneurship_course_teacher_name');
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
        Schema::dropIfExists('entrepreneurships');
    }
}
