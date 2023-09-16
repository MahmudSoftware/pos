<?php

namespace Database\Seeders;

use App\Models\Depertment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepertmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Depertment::factory()->count(100000)->create();
    }
}
