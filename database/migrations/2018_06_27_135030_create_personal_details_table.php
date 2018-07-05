<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->string('middlename', 255);
            $table->string('gender', 255);
            $table->string('nationality', 255);
            $table->date('date_of_birth', 255);
            $table->string('district_of_birth', 255);
            $table->string('marital_status', 255);
            $table->integer('user_id')->unsigned();
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('personal_details');
    }
}
