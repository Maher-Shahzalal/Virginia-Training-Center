<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessEthicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_ethics', function (Blueprint $table) {
            $table->id();
            $table->string('business_ethics_course_name');
            $table->string('business_ethics_course_description');
            $table->string('business_ethics_course_price');
            $table->string('business_ethics_course_teacher_name');
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
        Schema::dropIfExists('business_ethics');
    }
}
