<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('regions')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Arusha',
                    'country_id' => 229,
                    'hasc' => 'TZ.AS',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Dar es Salaam',
                    'country_id' => 229,
                    'hasc' => 'TZ.DS',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Dodoma',
                    'country_id' => 229,
                    'hasc' => 'TZ.DO',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Geita',
                    'country_id' => 229,
                    'hasc' => 'TZ.GE',
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Iringa',
                    'country_id' => 229,
                    'hasc' => 'TZ.IG',
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Kagera',
                    'country_id' => 229,
                    'hasc' => 'TZ.KG',
                ),
            6 =>
                array (
                    'id' => 7,
                    'name' => 'Katavi',
                    'country_id' => 229,
                    'hasc' => 'TZ.KA',
                ),
            7 =>
                array (
                    'id' => 8,
                    'name' => 'Kigoma',
                    'country_id' => 229,
                    'hasc' => 'TZ.KM',
                ),
            8 =>
                array (
                    'id' => 9,
                    'name' => 'Kilimanjaro',
                    'country_id' => 229,
                    'hasc' => 'TZ.KL',
                ),
            9 =>
                array (
                    'id' => 10,
                    'name' => 'Lindi',
                    'country_id' => 229,
                    'hasc' => 'TZ.LI',
                ),
            10 =>
                array (
                    'id' => 11,
                    'name' => 'Manyara',
                    'country_id' => 229,
                    'hasc' => 'TZ.MY',
                ),
            11 =>
                array (
                    'id' => 12,
                    'name' => 'Mara',
                    'country_id' => 229,
                    'hasc' => 'TZ.MA',
                ),
            12 =>
                array (
                    'id' => 13,
                    'name' => 'Mbeya',
                    'country_id' => 229,
                    'hasc' => 'TZ.MB',
                ),
            13 =>
                array (
                    'id' => 14,
                    'name' => 'Morogoro',
                    'country_id' => 229,
                    'hasc' => 'TZ.MO',
                ),
            14 =>
                array (
                    'id' => 15,
                    'name' => 'Mtwara',
                    'country_id' => 229,
                    'hasc' => 'TZ.MT',
                ),
            15 =>
                array (
                    'id' => 16,
                    'name' => 'Mwanza',
                    'country_id' => 229,
                    'hasc' => 'TZ.MZ',
                ),
            16 =>
                array (
                    'id' => 17,
                    'name' => 'Njombe',
                    'country_id' => 229,
                    'hasc' => 'TZ.NJ',
                ),
            17 =>
                array (
                    'id' => 18,
                    'name' => 'Pemba North',
                    'country_id' => 229,
                    'hasc' => 'TZ.PN',
                ),
            18 =>
                array (
                    'id' => 19,
                    'name' => 'Pemba South',
                    'country_id' => 229,
                    'hasc' => 'TZ.PS',
                ),
            19 =>
                array (
                    'id' => 20,
                    'name' => 'Pwani',
                    'country_id' => 229,
                    'hasc' => 'TZ.PW',
                ),
            20 =>
                array (
                    'id' => 21,
                    'name' => 'Rukwa',
                    'country_id' => 229,
                    'hasc' => 'TZ.RU',
                ),
            21 =>
                array (
                    'id' => 22,
                    'name' => 'Ruvuma',
                    'country_id' => 229,
                    'hasc' => 'TZ.RV',
                ),
            22 =>
                array (
                    'id' => 23,
                    'name' => 'Shinyanga',
                    'country_id' => 229,
                    'hasc' => 'TZ.SY',
                ),
            23 =>
                array (
                    'id' => 24,
                    'name' => 'Simiyu',
                    'country_id' => 229,
                    'hasc' => 'TZ.SI',
                ),
            24 =>
                array (
                    'id' => 25,
                    'name' => 'Singida',
                    'country_id' => 229,
                    'hasc' => 'TZ.SD',
                ),
            25 =>
                array (
                    'id' => 26,
                    'name' => 'Tabora',
                    'country_id' => 229,
                    'hasc' => 'TZ.TB',
                ),
            26 =>
                array (
                    'id' => 27,
                    'name' => 'Tanga',
                    'country_id' => 229,
                    'hasc' => 'TZ.TN',
                ),
            27 =>
                array (
                    'id' => 28,
                    'name' => 'Zanzibar North',
                    'country_id' => 229,
                    'hasc' => 'TZ.ZN',
                ),
            28 =>
                array (
                    'id' => 29,
                    'name' => 'Zanzibar South and Central',
                    'country_id' => 229,
                    'hasc' => 'TZ.ZS',
                ),
            29 =>
                array (
                    'id' => 30,
                    'name' => 'Zanzibar West',
                    'country_id' => 229,
                    'hasc' => 'TZ.ZW',
                ),
            30 =>
                array (
                    'id' => 31,
                    'name' => 'Songwe',
                    'country_id' => 229,
                    'hasc' => NULL,
                ),
            31 =>
                array (
                    'id' => 32,
                    'name' => 'Unguja South',
                    'country_id' => 229,
                    'hasc' => NULL,
                ),
            32 =>
                array (
                    'id' => 33,
                    'name' => 'Unguja North',
                    'country_id' => 229,
                    'hasc' => NULL,
                ),
        ));
    }
}