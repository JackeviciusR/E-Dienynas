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
            $table->id()->index();
            $table->smallInteger('grade')->nullabale(false);
            $table->boolean('is_edited')->nullable(true);
            $table->string('status', 10)->nullable(true);
            $table->unsignedBigInteger('grade_type_id');
            $table->foreign('grade_type_id')->references('id')->on('grade_types');
            $table->unsignedBigInteger('student_group_id');
            $table->foreign('student_group_id')->references('id')->on('student_groups');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users');
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users');
            $table->unsignedBigInteger('schedule_id');
            $table->foreign('schedule_id')->references('id')->on('schedules');

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
        Schema::dropIfExists('grades');
    }
}
