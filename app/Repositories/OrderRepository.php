<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function all()
    {
        return Order::with(['products' => function($query) {
            $query->select([
                'id',
                'name',
                'price',
                'pivot.price',
                'pivot.amount'
            ]);
            $query->orderBy('sort');
        }])->get();
    }
}