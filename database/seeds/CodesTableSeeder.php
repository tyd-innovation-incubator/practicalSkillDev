<?php

use Illuminate\Database\Seeder;
use Database\TruncateTable;
use Database\DisableForeignKeys;

class CodesTableSeeder extends Seeder
{
  use DisableForeignKeys, TruncateTable;

  /**
   * Auto generated seed file
   *
   * @return void
   */
  public function run()
  {

//
//    $this->disableForeignKeys("codes");
//    $this->delete('codes');

    \DB::table('user_accounts')->insert(array (
        0 =>
            array (
                'id' => 1,
                'name' => 'Administrator',
                'lang' => 'Administrator',
                'is_system_defined' => 1,
            ),
        1 =>
            array (
                'id' => 2,
                'name' => 'Company',
                'lang' => 'Company',
                'is_system_defined' => 0,
            ),
        2 =>
            array (
                'id' => 3,
                'name' => 'Candidate',
                'lang' => 'Candidate',
                'is_system_defined' => 1,
            ),
        3 =>
            array (
                'id' => 4,
                'name' => 'Site User',
                'lang' => 'Site User',
                'is_system_defined' => 1,
            ),


    ));

  }
}
