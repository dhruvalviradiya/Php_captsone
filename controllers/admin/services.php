<?php

use App\Models\Service;

$title = 'Services';
$serviceObj = new Service();
$msg = '';
$services = [];
if (!empty($_GET['search']) && $_GET['search'] == trim($_GET['search'])) {
    $services = $serviceObj->getAllBySearch($_GET['search']);
    $msg = 'You searched for: ' .  $_GET['search'];
} else {
    $services = $serviceObj->getAll(/*order by*/'desc');
}

if (isset($services) && count($services) == 0 && isset($_GET['search'])) {
    $msg = "Sorry, we could not find any services matching your request!";
}
view('admin/services', compact('title', 'services', 'msg'));
