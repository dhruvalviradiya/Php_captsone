<?php

use App\Models\Order;

$title = 'Order List';
$orderObj = new Order();
$orders = $orderObj->getOrdersByUser($_SESSION['user_id']);

// dd($orders);
view('orders', compact(
    'title',
    'orders'
));
