<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);

        $this->call(UniversitySeeder::class);
        //$this->call(AddressSeeder::class);
        $this->call(CompanySeeder::class);
        //$this->call(PersonalSeeder::class);
       // $this->call(SchoolSeeder::class);
        $this->call(ProjectSeeder::class);
        
    }
}
