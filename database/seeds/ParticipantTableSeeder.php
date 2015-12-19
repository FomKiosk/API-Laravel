<?php

use Illuminate\Database\Seeder;

class ParticipantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Participant::create([
            'barcode' => "1",
            'name' => 'Ssoele',
            'image' => 'ssoele',
        ]);
    }
}
