<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;

class OrdersController extends Controller
{
    /**
     * @var OrderRepository
     */
    protected $orderRepository;

    /**
     * OrdersController constructor.
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Return all the orders with their products and price/amount at given time
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        $orders = $this->orderRepository->all();

        return response()->json($orders, 200);
    }

    public function store(Request $request)
    {
        $order_data = json_decode($request->get('products'));
        $kiosk_id = 1;
        $participant_id = 1;

        $order = $this->orderRepository->create($kiosk_id, $participant_id, $order_data->products);
        return ["order" => $order->id];
    }
}
