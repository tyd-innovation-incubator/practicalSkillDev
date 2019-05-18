<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('regions', function(Blueprint $table)
        {
            $table->smallInteger('id', true);
            $table->string('name', 191)->unique();
            $table->smallInteger('country_id')->index();
            $table->timestamps();
            $table->string('hasc', 6)->nullable();
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
