<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('categories_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->boolean('avatar')->default(false);
            $table->integer('price');
            $table->integer('hit')->default('0');
            $table->integer('validate')->default('0');
            $table->string('description');
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
        Schema::dropIfExists('Annonces');
    }
}
