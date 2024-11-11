<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Address;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Address::class;

    public function definition(): array
    {
        return [
            'number' => $this->faker->buildingNumber(),
            'village' => $this->faker->word(),
            'moo' => $this->faker->numberBetween(1, 10),
            'soi' => $this->faker->streetSuffix(),
            'road' => $this->faker->streetName(),
            'tambon' => $this->faker->city(),
            'amphoe' => $this->faker->citySuffix(),
            'province' => $this->faker->state(),
            'code' => $this->faker->postcode(),
            'person_id' => \App\Models\Personal::factory(),
        ];
    }
}
