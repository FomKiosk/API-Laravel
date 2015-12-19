<?php

namespace App\Repositories;

use App\Models\Station;

class StationRepository
{
    /**
     * Get the stations with their products
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getStationsWithProducts()
    {
        return Station::with(['products' => function($q) {
            $q->select('id');
            $q->orderBy('sort');
        }])->get();
    }
}