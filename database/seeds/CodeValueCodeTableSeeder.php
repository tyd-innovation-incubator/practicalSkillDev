<?php

use Illuminate\Database\Seeder;

class CodeValueCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      \DB::table('code_value_code')->insert(array (
          0 =>
          array (
              'id' => 1,
              'code_value_id' => 1,
              'code_id' => 1,
          ),
          1 =>
          array (
              'id' => 2,
              'code_value_id' => 2,
              'code_id' => 1,
          ),
          2 =>
           array (
               'id' => 3,
               'code_value_id' => 3,
               'code_id' => 1,
           ),
           3 =>
           array (
               'id' => 4,
               'code_value_id' => 4,
               'code_id' => 1,
           ),
         ));
    }
}
