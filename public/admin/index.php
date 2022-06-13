<?php

// entry point and common file for every page
require __DIR__ . '/../../config/general_config.php';

/* logger */
if (!isAdmin()) {
    setToastMsg('You are not authorized to view this page. Please login with valid credentials', 'error');
    header('Location:/');
    die;
}

use App\Lib\DatabaseLogger;
use App\Lib\FileLogger;
// Read the request
$allowed = [
    'dashboard',
    'category',
    'services',
    'orders',
    'users',

    'add-service',
    'edit-service',
    'process-service',
    'process-edit-service',
    'delete-service'
];

// Figure out what user is requesting 
if (empty($_GET['p'])) {
    $page = 'dashboard';
} elseif (in_array($_GET['p'], $allowed)) {
    $page = $_GET['p'];
} else {
    $page = 'error-404';
    // error response code
    http_response_code(404);
}



/** logger start */
$databaseLogger = new DatabaseLogger($dbh);
logEvent($databaseLogger);

// path 
// $file = __DIR__ . '/../../logs/events.log';
// $fh = fopen($file, 'a');
// $fileLogger = new FileLogger($fh);
// logEvent($fileLogger);
/** logger end */

// Load it if we have it (and it's allowed)
$path = __DIR__ . '/../../controllers/admin/' . $page . '.php';
require($path);

// output 404 error message if we don't have
