<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Return all the orders with their products and price/amount at given time
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
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
