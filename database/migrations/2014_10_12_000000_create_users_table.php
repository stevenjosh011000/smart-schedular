<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usertype')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('parentEmail')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('phoneNo')->nullable();
            $table->string('gender')->nullable();
            $table->string('id_no')->nullable();
            $table->string('code')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=active, 0=inactive');

            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
};
