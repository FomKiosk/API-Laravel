<?php

use App\Product;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Coca Cola',
            'price' => 1.5,
            'visible' => true,
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Coca Cola Light',
            'price' => 1.5,
            'visible' => true,
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Coca Cola Zero',
            'price' => 1.5,
            'visible' => true,
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Ice Tea',
            'price' => 2,
            'visible' => true,
            'category_id' => 1
        ]);

        Product::create([
            'name' => 'Bicky Burger',
            'price' => 3.5,
            'visible' => true,
            'category_id' => 2
        ]);
        Product::create([
            'name' => 'Pepperoni',
            'price' => 7,
            'visible' => true,
            'category_id' => 3
        ]);
    }
}
