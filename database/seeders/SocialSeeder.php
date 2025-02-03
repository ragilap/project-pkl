<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('socials')->insert([
            'nama' => 'Twitter',
            'link' => 'Ratione. orbem vincere possumus',
            'icon' => 'twitter'
        ]);

        DB::table('socials')->insert([
            'nama' => 'Facebook',
            'link' => 'Ratione. orbem vincere possumus',
            'icon' => 'facebook'
        ]);

        DB::table('socials')->insert([
            'nama' => 'Instagram',
            'link' => 'Ratione. orbem vincere possumus',
            'icon' => 'instagram'
        ]);

        DB::table('socials')->insert([
            'nama' => 'Linkedin',
            'link' => 'Ratione. orbem vincere possumus',
            'icon' => 'linkedin'
        ]);
    }
}
