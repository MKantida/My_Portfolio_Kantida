<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /// สร้างข้อมูลตัวอย่าง 1 รายการสำหรับ Address
        Project::factory()->count(1)->create();
    }
}
