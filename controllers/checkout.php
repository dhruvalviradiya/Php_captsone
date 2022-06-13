<?php

if (!isUserLoggedIn()) {
    setToastMsg('Please login to your account to proceed with checkout.', 'error');
    $_SESSION['target'] = 'checkout';
    header('Location: /?p=login');
    die;
}

$title = 'Payment Information';
$cart = $_SESSION['cart'];
$priceArray = array_map(fn ($val) => floatval($val['price']), $cart);
$sub_total = array_sum($priceArray);
$gst = $sub_total * 5 / 100;
$pst = $sub_total * 7 / 100;
$total = $sub_total + $gst + $pst;

view('checkout', compact(
    'post',
    'errors',
    'title',
    'cart',
    'sub_total',
    'gst',
    'pst',
    'total',
));
