<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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

            $table->unsignedBigInteger('person_id')->nullable(true);
            $table->foreign('person_id')->references('id')->on('people');

            $table->unsignedBigInteger('role_id')->nullable(true);
            $table->foreign('role_id')->references('id')->on('roles');

            $table->unsignedBigInteger('school_id')->nullable(true);
            $table->foreign('school_id')->references('id')->on('schools');

            $table->string('username',32);
            $table->string('email',32)->nullable(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

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
}
