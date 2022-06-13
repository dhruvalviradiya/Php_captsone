<?php

// validate form

use App\Lib\Validator;
use App\Models\Order;
use App\Models\User;

$v = new Validator($_POST);

// test that required fields have values
$required = [
    'name',
    'credit_card_number',
    'expiry_month',
    'expiry_year',
    'cvv'
];

$v->validateRequired($required);

// validate string
$v->validateString('name');
// validate numbers
$v->validateNumbersWithLength('credit_card_number', '16', '16 numbers');
$v->validateNumbersWithLength('cvv', '3,4', '3 or 4 numbers');

// no error add into order and order details table
if (count($v->getErrors()) == 0) {
    $cart = $_SESSION['cart'];
    $priceArray = array_map(fn ($val) => floatval($val['price']), $cart);
    $sub_total = array_sum($priceArray);
    $gst = $sub_total * 5 / 100;
    $pst = $sub_total * 7 / 100;
    $total = $sub_total + $gst + $pst;
    $userObj = new User();
    $user = $userObj->getOne($_SESSION['user_id']);
    $address =
        formatAddress(esc($user['street'] ?? ''), esc($user['city'] ?? ''), esc($user['province'] ?? ''), esc($user['postal_code'] ?? ''), esc($user['country'] ?? ''));
    $payload = [
        'sub_total' => $sub_total,
        'gst' => $gst,
        'pst' => $pst,
        'total' => $total,
        'user_id' => $_SESSION['user_id'],
        'credit_card_info' => substr($_POST['credit_card_number'], strlen($_POST['credit_card_number']) - 4, 4),
        'auth' => rand(100, 1000),
        'order_status' => 'confirmed',
        'address' => $address
    ];
    $orderObj = new Order();
    try {
        $orderObj->getDbh()->beginTransaction();
        $order_id = $orderObj->createOrder($payload);
        $orderObj->createOrderService($_SESSION['cart'], $order_id);
        $orderObj->getDbh()->commit();

        if ($order_id) {
            setToastMsg('Order has been placed successfully.Please print this page for your records.', 'success');
            //remove from cart
            unset($_SESSION['cart']);
            $_SESSION['order_id'] = $order_id;
            header('Location:/?p=invoice');
            die;
        }
    } catch (PDOException $e) {
        // roll back the transaction if something failed
        $orderObj->getDbh()->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    // error then redirect back
    $_SESSION['post'] = $_POST;
    $_SESSION['errors'] = $v->getErrors();
    setToastMsg('Please correct errors.', 'error');
    header('Location: /?p=checkout'); // GET request
    die;
}
