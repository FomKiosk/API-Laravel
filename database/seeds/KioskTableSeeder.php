<?php

use Illuminate\Database\Seeder;

class KioskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Kiosk::create([
            'type_id' => 3,
            'name' => 'Kisok One',
            'uid' => 1,
            'secret' => 1,
        ]);
    }
}
