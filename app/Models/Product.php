<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var array
     */
    protected $hidden = [
        'category_id',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the category from this product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Retrieve all stations coupled to this product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function stations()
    {
        return $this->belongsToMany('App\Models\Station');
    }

    /**
     * Retrieve all orders that have this product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    /**
     * Get the subcategory related to this product
     */
    public function subCategory()
    {
        //TODO : return the relationship based on the category_sub_id field
    }
}
