<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * Get the kiosk for this order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kiosk()
    {
        return $this->belongsTo('App\Kiosk');
    }

    /**
     * Retrieve all the products from this order
     * The pivot table contains the price at the time the order was placed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
