<?php



// entry point and common file for every page
require __DIR__ . '/../config/general_config.php';

/* logger */

use App\Lib\DatabaseLogger;
use App\Lib\FileLogger;

// Read the request
$allowed = [
    'home', 'services', 'service-detail', 'about-us', 'pricing', 'contact-us', 'sign-up',
    'process-sign-up', 'my-profile', 'login',  'process-login', 'logout',
    'view-cart', 'handle-cart', 'remove-cart', 'checkout', 'handle-payment',
    'invoice', 'orders'
];


$protected_pages = ['my-profile', 'logout', 'handle-php', 'invoice', 'orders'];
$before_login_pages = ['login',  'process-login', 'sign-up', 'process-sign-up'];

// Figure out what user is requesting 
if (empty($_GET['p'])) {
    $page = 'home';
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
// $file = __DIR__ . '/../logs/events.log';
// $fh = fopen($file, 'a');
// $fileLogger = new FileLogger($fh);
// logEvent($fileLogger);

/** logger end */

if (!empty($_GET['p']) && in_array($_GET['p'], $before_login_pages) && isUserLoggedIn()) {
    setToastMsg('Sorry, you are can not access ' . $_GET['p'] . ' page after logged in', 'info');
    header('Location:/');
    die;
}
// Figure out if we have that and if the user is allowed to requrest
if (!empty($_GET['p']) && in_array($_GET['p'], $protected_pages) && !isUserLoggedIn()) {
    $page = 'error-405';
    // error response code
    http_response_code(405);
}


// Load it if we have it (and it's allowed)
$path = __DIR__ . '/../controllers/' . $page . '.php';
require($path);

// output 404 error message if we don't have
