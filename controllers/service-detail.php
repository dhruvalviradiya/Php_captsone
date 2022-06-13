<?php

use App\Models\Service;

$serviceObj = new Service();
$service = null;
if (!empty($_GET['service']) && $_GET['service'] == intval($_GET['service'])) {
    $service = $serviceObj->getOne($_GET['service']);
}
$title = 'Service Details';

if (empty($service)) {
    setToastMsg('Something went wrong with request. Please try again later', 'error');
    Header('Location:/?p=services');
    die;
}

view('service-detail', compact('title', 'service'));
