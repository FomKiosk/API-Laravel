<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kiosk extends Model
{

    /**
     * Get the type from this kiosk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kioskType()
    {
        return $this->belongsTo('App\Models\KioskType');
    }
    /**
     * Get all orders created by this kiosk
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
