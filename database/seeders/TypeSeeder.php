<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('types')->insert([
            [
                'name' => 'Photo',
                'slug' => 'Photo'
            ],
            [
                'name' => 'Video',
                'slug' => 'Video'
            ],
        ]);
    }
}
