<?php

namespace Database\Factories;

use App\Models\Center;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Unit>
 */
class UnitFactory extends Factory
{

    /**
     * Random Phne Number Auto Generate Function
     * Return type string
     */

    public function generatePhoneNumber()
    {
        $phone = '01';
        for ($i = 0; $i <= 8; $i++) {
            $phone = $phone . rand(0, 9);
        }

        return $phone;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "code" => 'UNI-' . uniqid(),
            "center_id" => Center::all()->random()->id,
            "name" => $this->faker->name(),
            "status" => rand(0, 1),
            "cic_name" => $this->faker->name,
            "cic_number" => $this->generatePhoneNumber(),
            "cda_name" => $this->faker->name(),
            "cda_number" => $this->generatePhoneNumber(),
        ];
    }
}
