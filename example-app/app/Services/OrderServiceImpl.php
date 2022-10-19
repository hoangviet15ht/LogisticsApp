<?php

namespace App\Services;

use App\Services\Interfaces\OrderService;
use App\Models\Order;

class OrderServiceImpl extends BaseServiceImpl implements OrderService
{
    public function createOrder(array $data) {
        // todo:
    }

    public function updateOrder(Order $order, array $data) : bool {
        return $order->update($data);
    }
}
