<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeValueCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('code_value_code', function(Blueprint $table)
  {
    $table->smallInteger('id', true);
    $table->smallInteger('code_value_id');
    $table->smallInteger('code_id');
    $table->timestamps();
    $table->unique(['code_value_id','code_id']);
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
