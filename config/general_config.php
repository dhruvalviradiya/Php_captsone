<?php

define('ENV', 'development');

// error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* our front controller
******************************** */

ob_start();
session_start();

//generate csrf token if not found
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] =  md5(uniqid(mt_rand(), true));
}

// check post request and if not found then exit
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token mismatch');
    }
}

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/functions.php';
require __DIR__ . '/../config/connect.php';
require __DIR__ . '/../config/escape.php';

use App\Models\Model;

Model::init($dbh);


$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

$post = $_SESSION['post'] ?? [];
unset($_SESSION['post']);

// cart 
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
