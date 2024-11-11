<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'project' => $this->faker->sentence(3),
            'tools' => $this->faker->randomElement(['PHP', 'JavaScript', 'Python', 'Java', 'Ruby']),
            'link' => $this->faker->url(),
        ];
    }
}
