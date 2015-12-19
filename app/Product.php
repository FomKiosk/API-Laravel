<?php

namespace App;

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
        'pivot'
    ];

    /**
     * Get the category from this product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Retrieve all stations coupled to this product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function stations()
    {
        return $this->belongsToMany('App\Station');
    }

    /**
     * Retrieve all orders that have this product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    /**
     * Get the subcategory related to this product
     */
    public function subCategory()
    {
        //TODO : return the relationship based on the category_sub_id field
    }
}
