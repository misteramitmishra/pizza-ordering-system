<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ToppingPrice;
use App\Models\Topping;
use App\Models\Size;

class ToppingPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = Size::all();
        $toppings = Topping::all();

        $toppings->each(function ($topping) use ($sizes) {
            $sizes->each(function ($size) use ($topping) {
                ToppingPrice::create([
                    'topping_id' => $topping->id,
                    'size_id' => $size->id,
                    'price' => rand(20, 50),
                ]);
            });
        });
    }
}
