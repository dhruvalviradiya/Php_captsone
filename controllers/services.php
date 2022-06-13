<?php

use App\Models\Category;
use App\Models\Service;

$title = 'Services';
$categoryObj = new Category();
$serviceObj = new Service();

$categories = $categoryObj->getAllWithServiceCount();


if (!empty($_GET['search']) && $_GET['search'] == trim($_GET['search'])) {
    $services = $serviceObj->getAllBySearch($_GET['search']);
    $title = 'You searched for: ' .  $_GET['search'];
} elseif (!empty($_GET['category']) && $_GET['category'] == intval($_GET['category'])) {
    $services = $serviceObj->getAllByCategory($_GET['category']);
    $title = 'Service by Category: ' . $services[0]['category_title'];
} else {
    $services = $serviceObj->getAll();
}

if (!count($services) && isset($_GET['search'])) {
    $title = "Sorry, we could not find any services matching your request!";
}

view('services', compact('title', 'categories', 'services'));
