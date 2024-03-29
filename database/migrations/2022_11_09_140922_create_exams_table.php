<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('exam_name');
            $table->dateTime('create_exam_dt');
            $table->dateTime('exam_start_dt')->nullable();
            $table->dateTime('exam_close_dt')->nullable();
            $table->string('module_name');
            $table->string('version')->nullable();
            $table->timestamps();

            // $table->unsignedBigInteger('exam_id')->nullable();
            // $table->foreign('exam_id')->references('id')->on('exams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
