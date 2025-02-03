<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SuperAdmin = User::create([
        'name' => 'ragil',
        'username'=>'ragilap',
        'email'=> 'ragil9478@gmail.com',
        'role'=>'superadmin',
        'password'=> bcrypt('vipergt53')
        ]);
        $SuperAdmin->assignRole('superadmin');

        $Admin = User::create([
            'name' => 'Admin',
            'username'=>'Admin',
            'email'=> 'Admin@gmail.com',
            'role'=>'admin',
            'password'=> bcrypt('admin')
        ]);
        $Admin->assignRole('admin');
    }
}
