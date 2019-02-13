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
      Schema::create('users', function(Blueprint $table)
  {
    $table->integer('id', true);
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->string('remember_token', 100)->nullable();
    $table->timestamps();
    $table->dateTime('email_verified_at')->nullable();
    $table->string('othernames', 80);
    $table->dateTime('last_login')->nullable();
    $table->boolean('confirmed')->default(0);
    $table->string('confirmation_code', 60);
    $table->smallInteger('isactive')->default(1);
    $table->smallInteger('available')->default(1)->comment('set whether user is available to be seen by other portal users or not 1. Yes, 0. No ( If set 0, other users will not find this user through searching )');
    $table->string('uuid', 100);
    $table->string('external_id', 100)->nullable()->comment('any additional reference for this user');
    $table->text('province')->nullable()->comment('home location of the user if he is not living in Tanzania');
    $table->decimal('rating', 2, 1)->default(0.0)->comment('Rating of the user ranging from 0 - 5.0 as generally provided users. This will be derived as the average from the user_reviews table');
    $table->string('lang', 2)->default('sw')->comment('language selected by the user ');
    $table->string('username', 30)->unique();
    $table->string('phone', 30)->nullable()->unique();
    $table->smallInteger('region_id')->nullable();
    $table->smallInteger('currency_id');
    $table->smallInteger('isonline')->default(0)->comment('show the online status of the user i.e. 1. Online 0. Offline');
  });

}


/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
  Schema::drop('users');
}

}
