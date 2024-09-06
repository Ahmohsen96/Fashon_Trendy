<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorsTableSeeder extends Seeder
{
    public function run()
    {
        $colors = ['Red', 'Green', 'Blue', 'Yellow', 'Black'];

        foreach ($colors as $color) {
            Color::create(['name' => $color]);
        }
    }
}
