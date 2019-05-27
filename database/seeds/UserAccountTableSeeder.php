<?php

use Illuminate\Database\Seeder;

class UserAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
