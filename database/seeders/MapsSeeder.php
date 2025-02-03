<?php

namespace Database\Seeders;

use Doctrine\DBAL\Schema\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('maps')->insert([
            'marker' => 'Bppi school',
            'latitude' => '-6.99894, 107.623497'
        ]);
    }
}
