<?php

namespace App\Services\Interfaces;

use App\Models\Order;
use Illuminate\Http\Request;
use Throwable;

interface OrderService
{
    public function createOrder(array $data);
    public function updateOrder(Order $order,array $data) : bool;
}
