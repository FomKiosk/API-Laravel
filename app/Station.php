<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    /**
     * @var string
     */
    protected $table = 'stations';

    /**
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot',
        'type_id'
    ];

    /**
     * Retrieve all products coupled to this station
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    /**
     * Get the type fro this station
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne('App\Type');
    }
}
