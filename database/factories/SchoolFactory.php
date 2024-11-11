<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\School;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = School::class;

    public function definition(): array
    {
        return [
            'schoolname' => $this->faker->company(),
            'program' => $this->faker->randomElement(['วิทย์คณิต', 'ไทยสังคม', 'คณิตอังกฤษ']),
            'grade' => $this->faker->randomFloat(2, 0, 4),

        ];
    }
}
