<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EducationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('education_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('user_id');
            $table->string('degree_name');
            $table->string('university_name');
            $table->string('qualification');
            $table->date('start_date');
            $table->date('end_date');
            $table->smallInteger('is_current_studying')->default(0);
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
        //
    }
}
