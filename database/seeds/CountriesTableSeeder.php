<?php

use Illuminate\Database\Seeder;
use Database\TruncateTable;
use Database\DisableForeignKeys;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        
        \DB::table('countries')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Tanzania',
                    'code' => 'TZ',
                ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Andorra',
                'code' => 'AD',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'United Arab Emirates',
                'code' => 'AE',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Afghanistan',
                'code' => 'AF',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Antigua and Barbuda',
                'code' => 'AG',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Anguilla',
                'code' => 'AI',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Albania',
                'code' => 'AL',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Armenia',
                'code' => 'AM',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Angola',
                'code' => 'AO',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Antarctica',
                'code' => 'AQ',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'Argentina',
                'code' => 'AR',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'American Samoa',
                'code' => 'AS',
            ),
            12 =>
            array (
                'id' => 13,
                'name' => 'Austria',
                'code' => 'AT',
            ),
            13 =>
            array (
                'id' => 14,
                'name' => 'Australia',
                'code' => 'AU',
            ),
            14 =>
            array (
                'id' => 15,
                'name' => 'Aruba',
                'code' => 'AW',
            ),
            15 =>
            array (
                'id' => 16,
                'name' => 'Åland Islands',
                'code' => 'AX',
            ),
            16 =>
            array (
                'id' => 17,
                'name' => 'Azerbaijan',
                'code' => 'AZ',
            ),
            17 =>
            array (
                'id' => 18,
                'name' => 'Bosnia and Herzegovina',
                'code' => 'BA',
            ),
            18 =>
            array (
                'id' => 19,
                'name' => 'Barbados',
                'code' => 'BB',
            ),
            19 =>
            array (
                'id' => 20,
                'name' => 'Bangladesh',
                'code' => 'BD',
            ),
            20 =>
            array (
                'id' => 21,
                'name' => 'Belgium',
                'code' => 'BE',
            ),
            21 =>
            array (
                'id' => 22,
                'name' => 'Burkina Faso',
                'code' => 'BF',
            ),
            22 =>
            array (
                'id' => 23,
                'name' => 'Bulgaria',
                'code' => 'BG',
            ),
            23 =>
            array (
                'id' => 24,
                'name' => 'Bahrain',
                'code' => 'BH',
            ),
            24 =>
            array (
                'id' => 25,
                'name' => 'Burundi',
                'code' => 'BI',
            ),
            25 =>
            array (
                'id' => 26,
                'name' => 'Benin',
                'code' => 'BJ',
            ),
            26 =>
            array (
                'id' => 27,
                'name' => 'Saint Barthélemy',
                'code' => 'BL',
            ),
            27 =>
            array (
                'id' => 28,
                'name' => 'Bermuda',
                'code' => 'BM',
            ),
            28 =>
            array (
                'id' => 29,
                'name' => 'Brunei Darussalam',
                'code' => 'BN',
            ),
            29 =>
            array (
                'id' => 30,
                'name' => 'Bolivia',
                'code' => 'BO',
            ),
            30 =>
            array (
                'id' => 31,
                'name' => 'Caribbean Netherlands',
                'code' => 'BQ',
            ),
            31 =>
            array (
                'id' => 32,
                'name' => 'Brazil',
                'code' => 'BR',
            ),
            32 =>
            array (
                'id' => 33,
                'name' => 'Bahamas',
                'code' => 'BS',
            ),
            33 =>
            array (
                'id' => 34,
                'name' => 'Bhutan',
                'code' => 'BT',
            ),
            34 =>
            array (
                'id' => 35,
                'name' => 'Bouvet Island',
                'code' => 'BV',
            ),
            35 =>
            array (
                'id' => 36,
                'name' => 'Botswana',
                'code' => 'BW',
            ),
            36 =>
            array (
                'id' => 37,
                'name' => 'Belarus',
                'code' => 'BY',
            ),
            37 =>
            array (
                'id' => 38,
                'name' => 'Belize',
                'code' => 'BZ',
            ),
            38 =>
            array (
                'id' => 39,
                'name' => 'Canada',
                'code' => 'CA',
            ),
            39 =>
            array (
                'id' => 40,
            'name' => 'Cocos (Keeling) Islands',
                'code' => 'CC',
            ),
            40 =>
            array (
                'id' => 41,
                'name' => 'Congo, Democratic Republic of',
                'code' => 'CD',
            ),
            41 =>
            array (
                'id' => 42,
                'name' => 'Central African Republic',
                'code' => 'CF',
            ),
            42 =>
            array (
                'id' => 43,
                'name' => 'Congo',
                'code' => 'CG',
            ),
            43 =>
            array (
                'id' => 44,
                'name' => 'Switzerland',
                'code' => 'CH',
            ),
            44 =>
            array (
                'id' => 45,
                'name' => 'Côte d\'Ivoire',
                'code' => 'CI',
            ),
            45 =>
            array (
                'id' => 46,
                'name' => 'Cook Islands',
                'code' => 'CK',
            ),
            46 =>
            array (
                'id' => 47,
                'name' => 'Chile',
                'code' => 'CL',
            ),
            47 =>
            array (
                'id' => 48,
                'name' => 'Cameroon',
                'code' => 'CM',
            ),
            48 =>
            array (
                'id' => 49,
                'name' => 'China',
                'code' => 'CN',
            ),
            49 =>
            array (
                'id' => 50,
                'name' => 'Colombia',
                'code' => 'CO',
            ),
            50 =>
            array (
                'id' => 51,
                'name' => 'Costa Rica',
                'code' => 'CR',
            ),
            51 =>
            array (
                'id' => 52,
                'name' => 'Cuba',
                'code' => 'CU',
            ),
            52 =>
            array (
                'id' => 53,
                'name' => 'Cape Verde',
                'code' => 'CV',
            ),
            53 =>
            array (
                'id' => 54,
                'name' => 'Curaçao',
                'code' => 'CW',
            ),
            54 =>
            array (
                'id' => 55,
                'name' => 'Christmas Island',
                'code' => 'CX',
            ),
            55 =>
            array (
                'id' => 56,
                'name' => 'Cyprus',
                'code' => 'CY',
            ),
            56 =>
            array (
                'id' => 57,
                'name' => 'Czech Republic',
                'code' => 'CZ',
            ),
            57 =>
            array (
                'id' => 58,
                'name' => 'Germany',
                'code' => 'DE',
            ),
            58 =>
            array (
                'id' => 59,
                'name' => 'Djibouti',
                'code' => 'DJ',
            ),
            59 =>
            array (
                'id' => 60,
                'name' => 'Denmark',
                'code' => 'DK',
            ),
            60 =>
            array (
                'id' => 61,
                'name' => 'Dominica',
                'code' => 'DM',
            ),
            61 =>
            array (
                'id' => 62,
                'name' => 'Dominican Republic',
                'code' => 'DO',
            ),
            62 =>
            array (
                'id' => 63,
                'name' => 'Algeria',
                'code' => 'DZ',
            ),
            63 =>
            array (
                'id' => 64,
                'name' => 'Ecuador',
                'code' => 'EC',
            ),
            64 =>
            array (
                'id' => 65,
                'name' => 'Estonia',
                'code' => 'EE',
            ),
            65 =>
            array (
                'id' => 66,
                'name' => 'Egypt',
                'code' => 'EG',
            ),
            66 =>
            array (
                'id' => 67,
                'name' => 'Western Sahara',
                'code' => 'EH',
            ),
            67 =>
            array (
                'id' => 68,
                'name' => 'Eritrea',
                'code' => 'ER',
            ),
            68 =>
            array (
                'id' => 69,
                'name' => 'Spain',
                'code' => 'ES',
            ),
            69 =>
            array (
                'id' => 70,
                'name' => 'Ethiopia',
                'code' => 'ET',
            ),
            70 =>
            array (
                'id' => 71,
                'name' => 'Finland',
                'code' => 'FI',
            ),
            71 =>
            array (
                'id' => 72,
                'name' => 'Fiji',
                'code' => 'FJ',
            ),
            72 =>
            array (
                'id' => 73,
                'name' => 'Falkland Islands',
                'code' => 'FK',
            ),
            73 =>
            array (
                'id' => 74,
                'name' => 'Micronesia, Federated States of',
                'code' => 'FM',
            ),
            74 =>
            array (
                'id' => 75,
                'name' => 'Faroe Islands',
                'code' => 'FO',
            ),
            75 =>
            array (
                'id' => 76,
                'name' => 'France',
                'code' => 'FR',
            ),
            76 =>
            array (
                'id' => 77,
                'name' => 'Gabon',
                'code' => 'GA',
            ),
            77 =>
            array (
                'id' => 78,
                'name' => 'United Kingdom',
                'code' => 'GB',
            ),
            78 =>
            array (
                'id' => 79,
                'name' => 'Grenada',
                'code' => 'GD',
            ),
            79 =>
            array (
                'id' => 80,
                'name' => 'Georgia',
                'code' => 'GE',
            ),
            80 =>
            array (
                'id' => 81,
                'name' => 'French Guiana',
                'code' => 'GF',
            ),
            81 =>
            array (
                'id' => 82,
                'name' => 'Guernsey',
                'code' => 'GG',
            ),
            82 =>
            array (
                'id' => 83,
                'name' => 'Ghana',
                'code' => 'GH',
            ),
            83 =>
            array (
                'id' => 84,
                'name' => 'Gibraltar',
                'code' => 'GI',
            ),
            84 =>
            array (
                'id' => 85,
                'name' => 'Greenland',
                'code' => 'GL',
            ),
            85 =>
            array (
                'id' => 86,
                'name' => 'Gambia',
                'code' => 'GM',
            ),
            86 =>
            array (
                'id' => 87,
                'name' => 'Guinea',
                'code' => 'GN',
            ),
            87 =>
            array (
                'id' => 88,
                'name' => 'Guadeloupe',
                'code' => 'GP',
            ),
            88 =>
            array (
                'id' => 89,
                'name' => 'Equatorial Guinea',
                'code' => 'GQ',
            ),
            89 =>
            array (
                'id' => 90,
                'name' => 'Greece',
                'code' => 'GR',
            ),
            90 =>
            array (
                'id' => 91,
                'name' => 'South Georgia and the South Sandwich Islands',
                'code' => 'GS',
            ),
            91 =>
            array (
                'id' => 92,
                'name' => 'Guatemala',
                'code' => 'GT',
            ),
            92 =>
            array (
                'id' => 93,
                'name' => 'Guam',
                'code' => 'GU',
            ),
            93 =>
            array (
                'id' => 94,
                'name' => 'Guinea-Bissau',
                'code' => 'GW',
            ),
            94 =>
            array (
                'id' => 95,
                'name' => 'Guyana',
                'code' => 'GY',
            ),
            95 =>
            array (
                'id' => 96,
                'name' => 'Hong Kong',
                'code' => 'HK',
            ),
            96 =>
            array (
                'id' => 97,
                'name' => 'Heard and McDonald Islands',
                'code' => 'HM',
            ),
            97 =>
            array (
                'id' => 98,
                'name' => 'Honduras',
                'code' => 'HN',
            ),
            98 =>
            array (
                'id' => 99,
                'name' => 'Croatia',
                'code' => 'HR',
            ),
            99 =>
            array (
                'id' => 100,
                'name' => 'Haiti',
                'code' => 'HT',
            ),
            100 =>
            array (
                'id' => 101,
                'name' => 'Hungary',
                'code' => 'HU',
            ),
            101 =>
            array (
                'id' => 102,
                'name' => 'Indonesia',
                'code' => 'ID',
            ),
            102 =>
            array (
                'id' => 103,
                'name' => 'Ireland',
                'code' => 'IE',
            ),
            103 =>
            array (
                'id' => 104,
                'name' => 'Israel',
                'code' => 'IL',
            ),
            104 =>
            array (
                'id' => 105,
                'name' => 'Isle of Man',
                'code' => 'IM',
            ),
            105 =>
            array (
                'id' => 106,
                'name' => 'India',
                'code' => 'IN',
            ),
            106 =>
            array (
                'id' => 107,
                'name' => 'British Indian Ocean Territory',
                'code' => 'IO',
            ),
            107 =>
            array (
                'id' => 108,
                'name' => 'Iraq',
                'code' => 'IQ',
            ),
            108 =>
            array (
                'id' => 109,
                'name' => 'Iran',
                'code' => 'IR',
            ),
            109 =>
            array (
                'id' => 110,
                'name' => 'Iceland',
                'code' => 'IS',
            ),
            110 =>
            array (
                'id' => 111,
                'name' => 'Italy',
                'code' => 'IT',
            ),
            111 =>
            array (
                'id' => 112,
                'name' => 'Jersey',
                'code' => 'JE',
            ),
            112 =>
            array (
                'id' => 113,
                'name' => 'Jamaica',
                'code' => 'JM',
            ),
            113 =>
            array (
                'id' => 114,
                'name' => 'Jordan',
                'code' => 'JO',
            ),
            114 =>
            array (
                'id' => 115,
                'name' => 'Japan',
                'code' => 'JP',
            ),
            115 =>
            array (
                'id' => 116,
                'name' => 'Kenya',
                'code' => 'KE',
            ),
            116 =>
            array (
                'id' => 117,
                'name' => 'Kyrgyzstan',
                'code' => 'KG',
            ),
            117 =>
            array (
                'id' => 118,
                'name' => 'Cambodia',
                'code' => 'KH',
            ),
            118 =>
            array (
                'id' => 119,
                'name' => 'Kiribati',
                'code' => 'KI',
            ),
            119 =>
            array (
                'id' => 120,
                'name' => 'Comoros',
                'code' => 'KM',
            ),
            120 =>
            array (
                'id' => 121,
                'name' => 'Saint Kitts and Nevis',
                'code' => 'KN',
            ),
            121 =>
            array (
                'id' => 122,
                'name' => 'North Korea',
                'code' => 'KP',
            ),
            122 =>
            array (
                'id' => 123,
                'name' => 'South Korea',
                'code' => 'KR',
            ),
            123 =>
            array (
                'id' => 124,
                'name' => 'Kuwait',
                'code' => 'KW',
            ),
            124 =>
            array (
                'id' => 125,
                'name' => 'Cayman Islands',
                'code' => 'KY',
            ),
            125 =>
            array (
                'id' => 126,
                'name' => 'Kazakhstan',
                'code' => 'KZ',
            ),
            126 =>
            array (
                'id' => 127,
                'name' => 'Lao People\'s Democratic Republic',
                'code' => 'LA',
            ),
            127 =>
            array (
                'id' => 128,
                'name' => 'Lebanon',
                'code' => 'LB',
            ),
            128 =>
            array (
                'id' => 129,
                'name' => 'Saint Lucia',
                'code' => 'LC',
            ),
            129 =>
            array (
                'id' => 130,
                'name' => 'Liechtenstein',
                'code' => 'LI',
            ),
            130 =>
            array (
                'id' => 131,
                'name' => 'Sri Lanka',
                'code' => 'LK',
            ),
            131 =>
            array (
                'id' => 132,
                'name' => 'Liberia',
                'code' => 'LR',
            ),
            132 =>
            array (
                'id' => 133,
                'name' => 'Lesotho',
                'code' => 'LS',
            ),
            133 =>
            array (
                'id' => 134,
                'name' => 'Lithuania',
                'code' => 'LT',
            ),
            134 =>
            array (
                'id' => 135,
                'name' => 'Luxembourg',
                'code' => 'LU',
            ),
            135 =>
            array (
                'id' => 136,
                'name' => 'Latvia',
                'code' => 'LV',
            ),
            136 =>
            array (
                'id' => 137,
                'name' => 'Libya',
                'code' => 'LY',
            ),
            137 =>
            array (
                'id' => 138,
                'name' => 'Morocco',
                'code' => 'MA',
            ),
            138 =>
            array (
                'id' => 139,
                'name' => 'Monaco',
                'code' => 'MC',
            ),
            139 =>
            array (
                'id' => 140,
                'name' => 'Moldova',
                'code' => 'MD',
            ),
            140 =>
            array (
                'id' => 141,
                'name' => 'Montenegro',
                'code' => 'ME',
            ),
            141 =>
            array (
                'id' => 142,
            'name' => 'Saint-Martin (France)',
                'code' => 'MF',
            ),
            142 =>
            array (
                'id' => 143,
                'name' => 'Madagascar',
                'code' => 'MG',
            ),
            143 =>
            array (
                'id' => 144,
                'name' => 'Marshall Islands',
                'code' => 'MH',
            ),
            144 =>
            array (
                'id' => 145,
                'name' => 'Macedonia',
                'code' => 'MK',
            ),
            145 =>
            array (
                'id' => 146,
                'name' => 'Mali',
                'code' => 'ML',
            ),
            146 =>
            array (
                'id' => 147,
                'name' => 'Myanmar',
                'code' => 'MM',
            ),
            147 =>
            array (
                'id' => 148,
                'name' => 'Mongolia',
                'code' => 'MN',
            ),
            148 =>
            array (
                'id' => 149,
                'name' => 'Macau',
                'code' => 'MO',
            ),
            149 =>
            array (
                'id' => 150,
                'name' => 'Northern Mariana Islands',
                'code' => 'MP',
            ),
            150 =>
            array (
                'id' => 151,
                'name' => 'Martinique',
                'code' => 'MQ',
            ),
            151 =>
            array (
                'id' => 152,
                'name' => 'Mauritania',
                'code' => 'MR',
            ),
            152 =>
            array (
                'id' => 153,
                'name' => 'Montserrat',
                'code' => 'MS',
            ),
            153 =>
            array (
                'id' => 154,
                'name' => 'Malta',
                'code' => 'MT',
            ),
            154 =>
            array (
                'id' => 155,
                'name' => 'Mauritius',
                'code' => 'MU',
            ),
            155 =>
            array (
                'id' => 156,
                'name' => 'Maldives',
                'code' => 'MV',
            ),
            156 =>
            array (
                'id' => 157,
                'name' => 'Malawi',
                'code' => 'MW',
            ),
            157 =>
            array (
                'id' => 158,
                'name' => 'Mexico',
                'code' => 'MX',
            ),
            158 =>
            array (
                'id' => 159,
                'name' => 'Malaysia',
                'code' => 'MY',
            ),
            159 =>
            array (
                'id' => 160,
                'name' => 'Mozambique',
                'code' => 'MZ',
            ),
            160 =>
            array (
                'id' => 161,
                'name' => 'Namibia',
                'code' => 'NA',
            ),
            161 =>
            array (
                'id' => 162,
                'name' => 'New Caledonia',
                'code' => 'NC',
            ),
            162 =>
            array (
                'id' => 163,
                'name' => 'Niger',
                'code' => 'NE',
            ),
            163 =>
            array (
                'id' => 164,
                'name' => 'Norfolk Island',
                'code' => 'NF',
            ),
            164 =>
            array (
                'id' => 165,
                'name' => 'Nigeria',
                'code' => 'NG',
            ),
            165 =>
            array (
                'id' => 166,
                'name' => 'Nicaragua',
                'code' => 'NI',
            ),
            166 =>
            array (
                'id' => 167,
                'name' => 'The Netherlands',
                'code' => 'NL',
            ),
            167 =>
            array (
                'id' => 168,
                'name' => 'Norway',
                'code' => 'NO',
            ),
            168 =>
            array (
                'id' => 169,
                'name' => 'Nepal',
                'code' => 'NP',
            ),
            169 =>
            array (
                'id' => 170,
                'name' => 'Nauru',
                'code' => 'NR',
            ),
            170 =>
            array (
                'id' => 171,
                'name' => 'Niue',
                'code' => 'NU',
            ),
            171 =>
            array (
                'id' => 172,
                'name' => 'New Zealand',
                'code' => 'NZ',
            ),
            172 =>
            array (
                'id' => 173,
                'name' => 'Oman',
                'code' => 'OM',
            ),
            173 =>
            array (
                'id' => 174,
                'name' => 'Panama',
                'code' => 'PA',
            ),
            174 =>
            array (
                'id' => 175,
                'name' => 'Peru',
                'code' => 'PE',
            ),
            175 =>
            array (
                'id' => 176,
                'name' => 'French Polynesia',
                'code' => 'PF',
            ),
            176 =>
            array (
                'id' => 177,
                'name' => 'Papua New Guinea',
                'code' => 'PG',
            ),
            177 =>
            array (
                'id' => 178,
                'name' => 'Philippines',
                'code' => 'PH',
            ),
            178 =>
            array (
                'id' => 179,
                'name' => 'Pakistan',
                'code' => 'PK',
            ),
            179 =>
            array (
                'id' => 180,
                'name' => 'Poland',
                'code' => 'PL',
            ),
            180 =>
            array (
                'id' => 181,
                'name' => 'St. Pierre and Miquelon',
                'code' => 'PM',
            ),
            181 =>
            array (
                'id' => 182,
                'name' => 'Pitcairn',
                'code' => 'PN',
            ),
            182 =>
            array (
                'id' => 183,
                'name' => 'Puerto Rico',
                'code' => 'PR',
            ),
            183 =>
            array (
                'id' => 184,
                'name' => 'Palestine, State of',
                'code' => 'PS',
            ),
            184 =>
            array (
                'id' => 185,
                'name' => 'Portugal',
                'code' => 'PT',
            ),
            185 =>
            array (
                'id' => 186,
                'name' => 'Palau',
                'code' => 'PW',
            ),
            186 =>
            array (
                'id' => 187,
                'name' => 'Paraguay',
                'code' => 'PY',
            ),
            187 =>
            array (
                'id' => 188,
                'name' => 'Qatar',
                'code' => 'QA',
            ),
            188 =>
            array (
                'id' => 189,
                'name' => 'Réunion',
                'code' => 'RE',
            ),
            189 =>
            array (
                'id' => 190,
                'name' => 'Romania',
                'code' => 'RO',
            ),
            190 =>
            array (
                'id' => 191,
                'name' => 'Serbia',
                'code' => 'RS',
            ),
            191 =>
            array (
                'id' => 192,
                'name' => 'Russian Federation',
                'code' => 'RU',
            ),
            192 =>
            array (
                'id' => 193,
                'name' => 'Rwanda',
                'code' => 'RW',
            ),
            193 =>
            array (
                'id' => 194,
                'name' => 'Saudi Arabia',
                'code' => 'SA',
            ),
            194 =>
            array (
                'id' => 195,
                'name' => 'Solomon Islands',
                'code' => 'SB',
            ),
            195 =>
            array (
                'id' => 196,
                'name' => 'Seychelles',
                'code' => 'SC',
            ),
            196 =>
            array (
                'id' => 197,
                'name' => 'Sudan',
                'code' => 'SD',
            ),
            197 =>
            array (
                'id' => 198,
                'name' => 'Sweden',
                'code' => 'SE',
            ),
            198 =>
            array (
                'id' => 199,
                'name' => 'Singapore',
                'code' => 'SG',
            ),
            199 =>
            array (
                'id' => 200,
                'name' => 'Saint Helena',
                'code' => 'SH',
            ),
            200 =>
            array (
                'id' => 201,
                'name' => 'Slovenia',
                'code' => 'SI',
            ),
            201 =>
            array (
                'id' => 202,
                'name' => 'Svalbard and Jan Mayen Islands',
                'code' => 'SJ',
            ),
            202 =>
            array (
                'id' => 203,
                'name' => 'Slovakia',
                'code' => 'SK',
            ),
            203 =>
            array (
                'id' => 204,
                'name' => 'Sierra Leone',
                'code' => 'SL',
            ),
            204 =>
            array (
                'id' => 205,
                'name' => 'San Marino',
                'code' => 'SM',
            ),
            205 =>
            array (
                'id' => 206,
                'name' => 'Senegal',
                'code' => 'SN',
            ),
            206 =>
            array (
                'id' => 207,
                'name' => 'Somalia',
                'code' => 'SO',
            ),
            207 =>
            array (
                'id' => 208,
                'name' => 'Suriname',
                'code' => 'SR',
            ),
            208 =>
            array (
                'id' => 209,
                'name' => 'South Sudan',
                'code' => 'SS',
            ),
            209 =>
            array (
                'id' => 210,
                'name' => 'Sao Tome and Principe',
                'code' => 'ST',
            ),
            210 =>
            array (
                'id' => 211,
                'name' => 'El Salvador',
                'code' => 'SV',
            ),
            211 =>
            array (
                'id' => 212,
            'name' => 'Sint Maarten (Dutch part)',
                'code' => 'SX',
            ),
            212 =>
            array (
                'id' => 213,
                'name' => 'Syria',
                'code' => 'SY',
            ),
            213 =>
            array (
                'id' => 214,
                'name' => 'Swaziland',
                'code' => 'SZ',
            ),
            214 =>
            array (
                'id' => 215,
                'name' => 'Turks and Caicos Islands',
                'code' => 'TC',
            ),
            215 =>
            array (
                'id' => 216,
                'name' => 'Chad',
                'code' => 'TD',
            ),
            216 =>
            array (
                'id' => 217,
                'name' => 'French Southern Territories',
                'code' => 'TF',
            ),
            217 =>
            array (
                'id' => 218,
                'name' => 'Togo',
                'code' => 'TG',
            ),
            218 =>
            array (
                'id' => 219,
                'name' => 'Thailand',
                'code' => 'TH',
            ),
            219 =>
            array (
                'id' => 220,
                'name' => 'Tajikistan',
                'code' => 'TJ',
            ),
            220 =>
            array (
                'id' => 221,
                'name' => 'Tokelau',
                'code' => 'TK',
            ),
            221 =>
            array (
                'id' => 222,
                'name' => 'Timor-Leste',
                'code' => 'TL',
            ),
            222 =>
            array (
                'id' => 223,
                'name' => 'Turkmenistan',
                'code' => 'TM',
            ),
            223 =>
            array (
                'id' => 224,
                'name' => 'Tunisia',
                'code' => 'TN',
            ),
            224 =>
            array (
                'id' => 225,
                'name' => 'Tonga',
                'code' => 'TO',
            ),
            225 =>
            array (
                'id' => 226,
                'name' => 'Turkey',
                'code' => 'TR',
            ),
            226 =>
            array (
                'id' => 227,
                'name' => 'Trinidad and Tobago',
                'code' => 'TT',
            ),
            227 =>
            array (
                'id' => 228,
                'name' => 'Tuvalu',
                'code' => 'TV',
            ),
            228 =>
            array (
                'id' => 229,
                'name' => 'Taiwan',
                'code' => 'TW',
            ),

            229 => 
            array (
                'id' => 230,
                'name' => 'Ukraine',
                'code' => 'UA',
            ),
            230 => 
            array (
                'id' => 231,
                'name' => 'Uganda',
                'code' => 'UG',
            ),
            231 => 
            array (
                'id' => 232,
                'name' => 'United States Minor Outlying Islands',
                'code' => 'UM',
            ),
            232 => 
            array (
                'id' => 233,
                'name' => 'United States',
                'code' => 'US',
            ),
            233 => 
            array (
                'id' => 234,
                'name' => 'Uruguay',
                'code' => 'UY',
            ),
            234 => 
            array (
                'id' => 235,
                'name' => 'Uzbekistan',
                'code' => 'UZ',
            ),
            235 => 
            array (
                'id' => 236,
                'name' => 'Vatican',
                'code' => 'VA',
            ),
            236 => 
            array (
                'id' => 237,
                'name' => 'Saint Vincent and the Grenadines',
                'code' => 'VC',
            ),
            237 => 
            array (
                'id' => 238,
                'name' => 'Venezuela',
                'code' => 'VE',
            ),
            238 => 
            array (
                'id' => 239,
            'name' => 'Virgin Islands (British)',
                'code' => 'VG',
            ),
            239 => 
            array (
                'id' => 240,
            'name' => 'Virgin Islands (U.S.)',
                'code' => 'VI',
            ),
            240 => 
            array (
                'id' => 241,
                'name' => 'Vietnam',
                'code' => 'VN',
            ),
            241 => 
            array (
                'id' => 242,
                'name' => 'Vanuatu',
                'code' => 'VU',
            ),
            242 => 
            array (
                'id' => 243,
                'name' => 'Wallis and Futuna Islands',
                'code' => 'WF',
            ),
            243 => 
            array (
                'id' => 244,
                'name' => 'Samoa',
                'code' => 'WS',
            ),
            244 => 
            array (
                'id' => 245,
                'name' => 'Yemen',
                'code' => 'YE',
            ),
            245 => 
            array (
                'id' => 246,
                'name' => 'Mayotte',
                'code' => 'YT',
            ),
            246 => 
            array (
                'id' => 247,
                'name' => 'South Africa',
                'code' => 'ZA',
            ),
            247 => 
            array (
                'id' => 248,
                'name' => 'Zambia',
                'code' => 'ZM',
            ),
            248 => 
            array (
                'id' => 249,
                'name' => 'Zimbabwe',
                'code' => 'ZW',
            ),
        ));

    }
}

