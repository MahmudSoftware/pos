<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Depertment>
 */
class DepertmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "code" => '001',
            "name" => $this->faker->name(),
            "description" => $this->faker->name(),
            "status" => 1,
        ];
    }
}
