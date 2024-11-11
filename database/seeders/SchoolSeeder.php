<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\School;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /// สร้างข้อมูลตัวอย่าง 1 รายการสำหรับ Address
        School::factory()->count(1)->create();
    }
}
