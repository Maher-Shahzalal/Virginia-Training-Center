<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNGOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_g_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('ngo_course_name');
            $table->string('ngo_course_description');
            $table->string('ngo_course_price');
            $table->string('ngo_course_teacher_name');
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
        Schema::dropIfExists('n_g_o_s');
    }
}
