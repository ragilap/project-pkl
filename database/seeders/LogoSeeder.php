<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Byte Craft',
                'quote' => 'Ratione. orbem vincere possumus',
                'type_id'=> 1,
                'deskripsi' => 'Dengan logika, kita bisa menguasai dunia',
                'image' => 'storage/images/imgheader2.jpg'
            ],

        ];
        foreach ($data as $item) {
            // Copy the image to the public directory
            $imagePath = 'images/' . basename($item['image']);
            Storage::copy('storage/images/' . basename($item['image']), $imagePath);

            // Insert data into the 'information' table with the public image path
            DB::table('logos')->insert([
                'nama' => $item['nama'],
                'deskripsi' => $item['deskripsi'],
                'image' => $imagePath,
                'type_id' => $item['type_id'],
                'quote' =>$item['quote']
            ]);
    }
}

}
