<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kiosk extends Model
{

    /**
     * Get the type from this kiosk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('App\Type');
    }
    /**
     * Get all orders created by this kiosk
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
