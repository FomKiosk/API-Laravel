<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['kiosk_id', 'finished', 'participant_id'];
    /**
     * Retrieve the participant from this order (can be null)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function participant()
    {
        return $this->belongsTo('App\Models\Participant');
    }

    /**
     * Get the kiosk for this order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kiosk()
    {
        return $this->belongsTo('App\Models\Kiosk');
    }

    /**
     * Retrieve all the products from this order
     * The pivot table contains the price at the time the order was placed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
