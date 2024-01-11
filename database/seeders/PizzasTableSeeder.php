<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;

class PizzasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizzaTypes = ['Farmhouse', 'Margarita', 'Peppy Paneer'];

        foreach ($pizzaTypes as $type) {
            Pizza::create(['type' => $type]);
        }
    }
}
