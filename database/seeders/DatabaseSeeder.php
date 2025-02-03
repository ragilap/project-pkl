<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(infoSeeder::class);
        $this->call(InfoValuesSeeder::class);
        $this->call(ImageInformationSeeder::class);
        $this->call(LogoSeeder::class);
        $this->call(SocialSeeder::class);
        $this->call(FooterContactSeeder::class);
        $this->call(MapsSeeder::class);
    }
}
