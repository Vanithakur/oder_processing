<?php

namespace App\Services;

use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService
{

    public function createOrder(array $orderData): ?Order
    {
        try {
            return DB::transaction(function () use ($orderData) {
                $order = Order::create($orderData);
                return $order;
            });
        } catch (Exception $e) {
            return null;
        }
    }
}
