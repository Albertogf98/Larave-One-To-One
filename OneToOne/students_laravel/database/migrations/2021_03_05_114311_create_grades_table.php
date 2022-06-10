<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject', 100);
            $table->decimal('value', 4,2)->unsigned();
            $table->date('exam_date');
            $table->integer('student_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->foreign('student_id')->on('users')->references('id');
            $table->foreign('teacher_id')->on('users')->references('id');
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
        Schema::drop('grades');
    }
}
