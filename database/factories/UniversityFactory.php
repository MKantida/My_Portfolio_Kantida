<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\University;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\University>
 */
class UniversityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = University::class;

    public function definition(): array
    {
        return [
            'universityname' => $this->faker->company(),
            'level' => $this->faker->word(),
            'degree' => $this->faker->word(),
            'faculty' => $this->faker->word(),
            'major' => $this->faker->word(),
            'gpa' => $this->faker->randomFloat(2, 0, 4),
            'school_id' => \App\Models\School::factory(), // เพิ่ม school_id ตรงนี้
        ];
    }
}
