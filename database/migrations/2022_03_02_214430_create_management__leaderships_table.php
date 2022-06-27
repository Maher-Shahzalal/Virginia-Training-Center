<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagementLeadershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('management__leaderships', function (Blueprint $table) {
            $table->id();
            $table->string('management_leadership_course_name');
            $table->string('management_leadership_course_description');
            $table->string('management_leadership_course_price');
            $table->string('management_leadership_course_teacher_name');
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
        Schema::dropIfExists('management__leaderships');
    }
}
