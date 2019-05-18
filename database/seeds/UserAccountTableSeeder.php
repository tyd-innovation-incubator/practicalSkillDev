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
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Company',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Candidate',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Site User',
                ),


        ));

    }
}
