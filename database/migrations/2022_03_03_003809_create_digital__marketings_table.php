<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitalMarketingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digital__marketings', function (Blueprint $table) {
            $table->id();
            $table->string('digital_marketing_course_name');
            $table->string('digital_marketing_course_description');
            $table->string('digital_marketing_course_price');
            $table->string('digital_marketing_course_teacher_name');
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
        Schema::dropIfExists('digital__marketings');
    }
}
