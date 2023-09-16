<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Center>
 */
class CenterFactory extends Factory
{

    /**
     * Generate Code.
     *
     * @var string
     */

    public function code()
    {
        $lastRecord = DB::table('centers')->orderBy('id', 'DESC')->first();
        $last_id = '';

        if (!isset($lastRecord))
        {

        }

        // if (isset($lastRecord)) {
            $last_id = $lastRecord->id;
        // } else {
        //     $last_id = 1;
        // }

        $code = 'CEN_' . $last_id;

        return $code;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            "code" => 'CEN-' . uniqid(),
            "name" => $this->faker->name(),
            "status" => rand(0,1),
            "address" => $this->faker->address(),
        ];
    }
}
