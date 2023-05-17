<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_students', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->nullable()->comment('user_id=student_id');
            $table->integer('class_id')->nullable();
            $table->integer('group')->nullable()->comment('1=odd week, 2=even week');
            $table->integer('tingkatan')->nullable()->comment('1=tingkatan 1, 2=tingkatan 2, 3=tingkatan 3, 4=tingkatan 4, 5=tingkatan 5, 0=peralihan');
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
        Schema::dropIfExists('assign_students');
    }
}
