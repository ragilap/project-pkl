<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Html',
                'slug' => 'Html',
                'deskripsi' => 'Belajar html dengan gampang menggunakan Byte craft',
                'image' => 'storage/images/html.png'
            ],

        ];
        foreach ($data as $item) {
            // Copy the image to the public directory
            $imagePath = 'images/' . basename($item['image']);
            Storage::copy('storage/images/' . basename($item['image']), $imagePath);

            // Insert data into the 'information' table with the public image path
            DB::table('categories')->insert([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'icon' => $imagePath,
                'deskripsi' => $item['deskripsi'],
            ]);
    }
    }
}
