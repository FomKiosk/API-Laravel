<?php

namespace App\Http\Controllers\Services;

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
        $kiosk_id = $request->get('kiosk_id');
        $participant_id = $request->get('participant');

        $order = $this->orderRepository->create($kiosk_id, $participant_id, $order_data->products);
        return ["order" => $order->id];
    }

    /**
     * Re
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function openOrders()
    {
        $open_orders = $this->orderRepository->getOpenOrders();
        return response()->json($open_orders, 200);
    }

    /**
     * Get the last 8 finished orders
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function finishedOrders()
    {
        $finished_orders = $this->orderRepository->getFinishedOrders();
        return response()->json($finished_orders, 200);
    }

    /**
     * Finish or put an order back
     *
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function update($id, Request $request)
    {
        $done = $request->get('done');
        if($done) {
            $order =$this->orderRepository->finishOrder($id);
        } else {
            $order = $this->orderRepository->unFinishOrder($id);
        }

        return $order;
    }
}
