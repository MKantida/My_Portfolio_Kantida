<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Personal;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personal>
 */
class PersonalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Personal::class;

    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'nickname' => $this->faker->Name(),
            'birthday' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->safeEmail(),
            // เพิ่มฟิลด์อื่นๆ ที่ต้องการ
        ];
    }
}
