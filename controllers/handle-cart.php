<?php

use App\Models\Service;

if ('POST' != $_SERVER['REQUEST_METHOD']) die('Unsupported request method');

$serviceObj = new Service();
$service = $serviceObj->getOne($_POST['id']);
if (empty($service)) {
    setToastMsg('Service is not found', 'error');
} else {
    $item = array(
        'id' => $service['id'],
        'title' => $service['title'],
        'image' => $service['image'],
        'price' => $service['price'],
    );

    $_SESSION['cart'][$service['id']] = $item;

    // success message
    setToastMsg('Service has been added to cart.', 'success');
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
die;
