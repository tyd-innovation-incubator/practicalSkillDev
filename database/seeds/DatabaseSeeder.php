<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // $this->call(UsersTableSeeder::class);
//    $this->call(CountriesTableSeeder::class);
//    $this->call(RegionsTableSeeder::class);
//    $this->call(CodesTableSeeder::class);
//    $this->call(CodeValuesTableSeeder::class);
//    $this->call(CodeValueCodeTableSeeder::class);
    $this->call(UserAccountTableSeeder::class);


  }
}
