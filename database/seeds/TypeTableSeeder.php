<?php

use App\Type;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class TypeTableSeeder extends Seeder
{
    public function run()
    {
        Type::create([
            'name' => 'Kitchen',
        ]);
        Type::create([
            'name'  => 'Friteuse',
        ]);
    }
}
