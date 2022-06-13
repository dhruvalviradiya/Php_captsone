<?php

if ('POST' != $_SERVER['REQUEST_METHOD']) die('Unsupported request method');

if (empty($_POST['id'])) die('Must provide id to delete record');

if (intval($_POST['id']) != $_POST['id']) die('Service Id must be an integer');

use App\Models\Service;

$service = new Service();
try {
    $service->delete($_POST['id']);
    setToastMsg('Service has been deleted successfully.', 'success');
} catch (Exception $e) {
    setToastMsg('Something went wrong please try again later', 'error');
}
header('Location: /admin/?p=services'); // GET request
die;
