<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Office>
 */
class OfficeFactory extends Factory
{


    /**
     * Random Phne Number Auto Generate Function
     * Return type string
     */

    public function generatePhoneNumber()
    {
        $phone = '01';
        for ($i = 0; $i <= 8; $i++)
        {
            $phone = $phone . rand(0,9);
        }

        return $phone;
    }

    /**
     * Return type string
     * Generate status
     */

    public function generateStatus()
    {
        return (int)rand(0,1);
    }

    /**
     * Generate Office type integer
     */
    public function generateOfficeType()
    {
        return rand(1,3);
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "code" => '001',
            "prefix" => $this->faker->name(),
            "name" => $this->faker->name(),
            "address" => $this->faker->address(),
            // 01786287789
            "phone" => $this->generatePhoneNumber(),
            "email" => $this->faker->safeEmail(),
            "type" => $this->generateOfficeType(),
            "status" => $this->generateStatus(),
            "description" => $this->faker->text(),
        ];
    }
}
