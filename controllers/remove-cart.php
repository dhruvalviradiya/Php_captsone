<?php


if ('POST' != $_SERVER['REQUEST_METHOD']) die('Unsupported request method');

if (isset($_POST['type'])) {
    if ($_POST['type'] == 'remove') {
        unset($_SESSION['cart'][$_POST['id']]);
        setToastMsg('Service has been removed from cart.', 'success');
    } else if ($_POST['type'] == 'clear') {
        unset($_SESSION['cart']);
        // success message
        setToastMsg('Service(s) has been removed to cart.', 'success');
    }
}
// die;
header('Location: ' . $_SERVER['HTTP_REFERER']);
die;
