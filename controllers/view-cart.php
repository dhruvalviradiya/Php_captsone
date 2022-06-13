<?php


$title = 'Shopping Cart';
$cart = $_SESSION['cart'];
$priceArray = array_map(fn ($val) => floatval($val['price']), $cart);
$sub_total = array_sum($priceArray);
$gst = $sub_total * 5 / 100;
$pst = $sub_total * 7 / 100;
$total = $sub_total + $gst + $pst;

view('view-cart', compact(
    'title',
    'cart',
    'sub_total',
    'gst',
    'pst',
    'total'
));
