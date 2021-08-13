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
            $table->string('name',45);
            $table->string('lastname',45);
            $table->string('email',45);
            $table->unsignedBigInteger('documenttype_id');
            $table->foreign('documenttype_id')->references('id')->on('documenttype');
            $table->unsignedBigInteger('genders_id');
            $table->foreign('genders_id')->references('id')->on('genders');
            $table->unsignedBigInteger('cities_id');
            $table->foreign('cities_id')->references('id')->on('cities');
            $table->unsignedBigInteger('cities_departments_id');
            $table->foreign('cities_id','departments_id')->references('id')->on('cities','departments');
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
