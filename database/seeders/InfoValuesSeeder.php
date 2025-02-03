<?php

namespace Database\Seeders;

use App\Models\infovalue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        infovalue::truncate();

        // Seed data
        infovalue::create([
            'icon' => 'clock',
            'judul' => 'Short-Time',
            'deskripsi'=> 'Rapid and Complex Web Development with Lightning-Fast Turnaround Time'
        ]);

        infovalue::create([
            'icon' => 'cash',
            'judul' => 'Low Fees',
            'deskripsi' => 'We ensure that our clients receive high-quality web development services without breaking the bank.'
        ]);

        infovalue::create([
            'icon' => 'desktop',
            'judul' => 'Best Quality',
            'deskripsi' => 'We prioritize quality code, robust architectures, and visually appealing designs to ensure a superior end product.'
        ]);

        infovalue::create([
            'icon' => 'protect',
            'judul'=> 'With Security Maximum',
            'deskripsi' => 'Our team employs industry best practices and standards to create a strong defense against common and emerging cybersecurity threats.'
        ]);
    }
}
