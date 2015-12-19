<?php

namespace App\Repositories;

use App\Models\Order;
use Mockery\CountValidator\Exception;

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

    public function create($kiosk_id, $participant_id, $products)
    {
        $order = Order::create([
            'kiosk_id' => $kiosk_id,
            'finished' => false,
            'participant_id' => $participant_id,
        ]);
        foreach ($products as $product) {
            //check if subproduct is added
            if(isset($product->sub)) {
                $sub = $product->sub;
            } else {
                $sub = null;
            }
            $order->products()->attach($product->id, ["price" => $product->price, "amount" => $product->amount, "product_id_sub" => $sub]);
        }

        return $order;
    }
}