<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\University;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /// สร้างข้อมูลตัวอย่าง 1 รายการสำหรับ Address
        University::factory()->count(1)->create();
    }
}
