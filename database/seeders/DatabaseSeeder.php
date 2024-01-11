<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    protected $seeders = [
        PizzasTableSeeder::class,
        SizesTableSeeder::class,
        ToppingsTableSeeder::class,
        PizzaPricesTableSeeder::class,
        ToppingPricesTableSeeder::class
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->truncateTables();

        foreach ($this->seeders as $seeder) {
            $this->call($seeder);
        }
    }

    protected function truncateTables()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $tables = [
            'pizzas',
            'sizes',
            'toppings',
            'pizza_prices',
            'topping_prices'
        ];

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
