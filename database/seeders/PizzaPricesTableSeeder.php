<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PizzaPrice;
use App\Models\Size;
use App\Models\Pizza;

class PizzaPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = Size::all();
        $pizzas = Pizza::all();

        $pizzas->each(function ($pizza) use ($sizes) {
            $sizes->each(function ($size) use ($pizza) {
                PizzaPrice::create([
                    'pizza_id' => $pizza->id,
                    'size_id' => $size->id,
                    'price' => rand(100, 500),
                ]);
            });
        });
    }
}
