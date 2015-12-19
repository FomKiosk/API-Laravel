<?php

use App\Category;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Drinks',
            'visible' => true,
        ]);
        Category::create([
            'name' => 'Burgers',
            'visible' => true,
            'sort' => 2,
        ]);
        Category::create([
            'name' => 'Pizzas',
            'visible' => true,
            'sort' => 1,
        ]);
    }
}
