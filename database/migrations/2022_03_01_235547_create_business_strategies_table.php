<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessStrategiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_strategies', function (Blueprint $table) {
            $table->id();
            $table->string('business_strategy_course_name');
            $table->string('business_strategy_course_description');
            $table->string('business_strategy_course_price');
            $table->string('business_strategy_course_teacher_name');
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
        Schema::dropIfExists('business_strategies');
    }
}
