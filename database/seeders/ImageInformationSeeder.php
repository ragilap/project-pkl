<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Storage;
class ImageInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kalimat3' => 'Byte Craft',
                'kalimat1' => 'Ratione. orbem',
                'kalimat2' => 'vincere possumus',
                'image' => 'storage/images/imgheader2.jpg'
            ],
            // Add more data as needed
        ];


        foreach ($data as $item) {
            // Copy the image to the public directory
            $imagePath = 'images/' . basename($item['image']);
            Storage::copy('storage/images/' . basename($item['image']), $imagePath);

            // Insert data into the 'information' table with the public image path
            DB::table('images')->insert([
                'kalimat3' => $item['kalimat3'],
                'kalimat1' => $item['kalimat1'],
                'kalimat2' => $item['kalimat2'],
                'image' => $imagePath,
            ]);
    }
    }
}
