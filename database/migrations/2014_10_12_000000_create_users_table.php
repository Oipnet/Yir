<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name', 60)->nullable();
            $table->string('email', 100)->unique();
            $table->boolean('confirmed')->default(false);
            $table->string('confirmation_token', 60);
            $table->string('password');
            $table->string('firstname',30)->nullable();
            $table->string('lastname',30)->nullable();
            $table->boolean('show_phone')->default(false);
            $table->integer('phone')->nullable();
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
