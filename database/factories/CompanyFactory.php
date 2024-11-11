<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'company' => $this->faker->company(),
            'position' => $this->faker->jobTitle(),
            'salary' => $this->faker->numberBetween(30000, 100000),
            'startday' => $this->faker->date(),
            'endday' => $this->faker->date(),
            'details' => $this->faker->text(100),
            // เพิ่มฟิลด์อื่นๆ ที่ต้องการ
        ];
    }
}
