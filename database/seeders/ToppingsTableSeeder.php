<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Topping;

class ToppingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $toppingNames = ['Extra Cheese', 'Jalapenos', 'Sweet Corns', 'Extra Veggies'];

        foreach ($toppingNames as $name) {
            Topping::create(['name' => $name]);
        }
    }
}
