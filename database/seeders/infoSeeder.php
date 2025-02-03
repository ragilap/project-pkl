<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class infoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'About Us',
                'isi' => '"Byte Craft is a term that encapsulates the essence of digital craftsmanship and technical expertise. In the realm of technology and computer science, Byte Craft represents the intricate artistry and skillful manipulation of bits and bytes to create innovative solutions. It signifies the craft of coding, designing, and engineering in the digital landscape. In the ever-evolving world of software development, Byte Craft embodies the dedication to precision, creativity, and continuous learning. It is a nod to the individuals and communities who strive for excellence in crafting software, contributing to the ongoing evolution of the digital ecosystem."',
                'image' => 'storage/images/lawyer.jpg',
            ],
            // Add more data as needed
        ];


        foreach ($data as $item) {
            // Copy the image to the public directory
            $imagePath = 'images/' . basename($item['image']);
            Storage::copy('storage/images/' . basename($item['image']), $imagePath);

            // Insert data into the 'information' table with the public image path
            DB::table('information')->insert([
                'judul' => $item['judul'],
                'isi' => $item['isi'],
                'image' => $imagePath,
            ]);
    }
}
}
