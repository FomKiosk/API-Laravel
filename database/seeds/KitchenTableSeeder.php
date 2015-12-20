<?php

use Illuminate\Database\Seeder;

class KitchenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Kitchen::create([
            'name' => 'Keuken 1',
        ]);
    }
}
