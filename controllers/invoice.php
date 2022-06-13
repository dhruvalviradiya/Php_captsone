<?php

use App\Models\Order;
use App\Models\User;

$title = 'Thank you for order.';
if (!isset($_SESSION['order_id']) || !$_SESSION['order_id']) {
    header('Location:/?p=services');
    die;
}
$user_id = $_SESSION['user_id'];
$order_id = $_SESSION['order_id'];
unset($_SESSION['order_id']);
$userObj = new User();
$orderObj = new Order();
$user = $userObj->getOne($user_id);
$order = $orderObj->getOne($order_id);
$order_services = $orderObj->getOrderDetails($order_id);


view('invoice', compact(
    'title',
    'user',
    'order',
    'order_services'
));
