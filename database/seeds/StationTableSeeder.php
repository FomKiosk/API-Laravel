<?php

use App\Product;
use App\Station;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class StationTableSeeder extends Seeder
{
    public function run()
    {
        $station = Station::create([
            'name' => 'Pizza Oven',
            'color' => 'D4B46A',
            'type_id' => 1,
        ]);

        $product = Product::find(6);

        $station->products()->save($product);

    }
}
