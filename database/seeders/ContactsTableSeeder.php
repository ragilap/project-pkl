<?php

namespace Database\Seeders;
use App\Models\contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::truncate();

        // Seed data
        Contact::create([
            'type' => 'geo-alt',
            'value' => 'A108 Adam Street, New York, NY 535022',
        ]);

        Contact::create([
            'type' => 'telephone',
            'value' => '+1 5589 55488 55',
        ]);

        Contact::create([
            'type' => 'envelope',
            'value' => 'info@example.com',
        ]);

        Contact::create([
            'type' => 'clock',
            'value' => 'Monday - Friday, 9:00AM - 05:00PM',
        ]);
    }
}
