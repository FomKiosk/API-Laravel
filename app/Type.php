<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * Get all the kiosk with a certain type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kiosks()
    {
        return $this->hasMany('App\Kiosk');
    }

    /**
     * Get all stations with a certain type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stations()
    {
        return $this->hasMany('App\Station');
    }
}
