<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;
use Exception;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric|min:0',
            'status' => 'required|string',
            'payment_method' => 'nullable|string',
            'shipping_address' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        try {
            $order = $this->orderService->createOrder([
                'user_id' => $request->user_id,
                'total' => $request->total,
                'status' => $request->status,
                'payment_method' => $request->payment_method,
                'shipping_address' => $request->shipping_address,
                'notes' => $request->notes,
            ]);

            if(isset($order)){
                return response()->json([
                    'message' => 'Order created successfully',
                    'order' => $order
                ], 201);
            }

            return response()->json([
                'message' => 'Failed to create order',
                'error' => $order
            ], 500);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to create order',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
