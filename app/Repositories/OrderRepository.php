<?php

namespace App\Repositories;

use App\Models\Order;
use Carbon\Carbon;
use Mockery\CountValidator\Exception;

class OrderRepository
{
    /**
     * Retrieve all orders with the products
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
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

    /**
     * Create an order with products
     *
     * @param $kiosk_id
     * @param $participant_id
     * @param $products
     * @return static
     */
    public function create($kiosk_id, $participant_id, $products)
    {
        $order = Order::create([
            'kiosk_id' => $kiosk_id,
            'finished' => null,
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

    /**
     * Retrieve all orders that have an open status
     *
     * @return array
     */
    public function getOpenOrders()
    {
        $orders =  Order::with('products')->where('finished', null)->get();

        return $this->prepareResponse($orders);
    }

    /**
     * Get the last 8 finished orders
     *
     * @return array
     */
    public function getFinishedOrders()
    {
        $orders = Order::with('products')->whereNotNull('finished')->take(8)->get();

        return $this->prepareResponse($orders);
    }

    /**
     * Finish an order
     *
     * @param $id
     * @return mixed
     */
    public function finishOrder($id)
    {
        $order = Order::find($id);

        $order->finished = Carbon::now();
        $order->save();

        return $order;
    }

    /**
     * Put an order from finished to unfinished
     *
     * @param $id
     * @return mixed
     */
    public function unFinishOrder($id)
    {
        $order = Order::find($id);

        $order->finished = null;
        $order->save();

        return $order;
    }

    /**
     * Prepare the orders array
     *
     * @param $database_orders
     * @return array
     */
    public function prepareResponse($database_orders)
    {
        $returnData = [];
        foreach($database_orders as $database_order) {
            $products = [];
            foreach($database_order->products as $database_product)
            {
                $product = [
                    "id" => $database_product->id,
                    "name" => $database_product->name,
                    "amount" => $database_product->pivot->amount,
                    "category_id_sub" => $database_product->category_id_sub
                ];
                array_push($products, $product);
            }
            $order = [
                "id" => $database_order->id,
                "kiosk_id" => $database_order->kiosk_id,
                "finished" => $database_order->finished,
                "participant_id" => $database_order->participant_id,
                "created_at"    => $database_order->created_at->toDateTimeString(),
                "updated_at"    => $database_order->updated_at->toDateTimeString(),
                "products" => $products
            ];

            array_push($returnData, $order);
        }
        return $returnData;
    }
}