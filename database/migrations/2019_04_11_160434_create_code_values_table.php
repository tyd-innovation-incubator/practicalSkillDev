<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_values', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('code_id');
            $table->string('name', 191);
            $table->string('lang', 100)->nullable()->comment('entry to facilitate language translation ');
            $table->text('description')->nullable();
            $table->string('reference', 10)->unique();
            $table->smallInteger('sort');
            $table->smallInteger('isactive')->default(1);
            $table->unique(['name','code_id']);
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
        Schema::dropIfExists('code_values');
    }
}
