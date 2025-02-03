<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadminRole= Role::create([
         'name'=>'superadmin',
         'guard_name'=> 'web'
        ]);
       $adminRole = Role::create([
         'name'=>'admin',
         'guard_name'=> 'web'
        ]);

        // $user = \App\Models\User::find(1); // Gantilah 1 dengan ID pengguna yang sesuai
        // $user->assignRole($superadminRole); // Memberikan peran 'superadmin' kepada pengguna

        // $anotherUser = \App\Models\User::find(2); // Gantilah 2 dengan ID pengguna yang lain
        // $anotherUser->assignRole($adminRole); // Memberikan peran 'admin' kepada pengguna lain
    }
}
