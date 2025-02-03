<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FooterContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('footer_contact')->insert([
            'alamat' => 'Anggadireja No.53 ',
            'kota' => 'Bandung City',
            'provinsi' => 'Indonesian West Java ',
            'phone' => '+08216363252',
            'email' => 'ByteCraft@gmail.com'
        ]);
    }
}
