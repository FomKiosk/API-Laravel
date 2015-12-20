<?php

use App\Models\KioskType;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class TypeTableSeeder extends Seeder
{
    public function run()
    {
        KioskType::create([
            'name' => 'Kitchen',
            'kitchen_id' => 1,
        ]);
        KioskType::create([
            'name'  => 'Friteuse',
            'kitchen_id' => 1,
        ]);
        KioskType::create([
            'name' => 'Kiosk',
            'kitchen_id' => 1,
        ]);
    }
}
