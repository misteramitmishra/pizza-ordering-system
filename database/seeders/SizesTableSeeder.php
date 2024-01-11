<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizeNames = ['Small', 'Medium', 'Large'];

        foreach ($sizeNames as $name) {
            Size::create(['name' => $name]);
        }
    }
}
