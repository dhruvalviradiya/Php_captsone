<?php

use App\Models\Order;

$title = 'Orders';
$orderObj = new Order();
$orders = $orderObj->getAll(/*order by*/'desc');

view('admin/orders', compact('title', 'orders'));
