<?php

$title = 'Dashboard';

/* logger */

use App\Lib\DatabaseLogger;
use App\Models\Dashboard;

$databaseLogger = new DatabaseLogger($dbh);

$logs = $databaseLogger->getLog();
$dashboardObj = new Dashboard();

$totalCategory = $dashboardObj->getTotalCategoryCount();
$totalServices = $dashboardObj->getTotalServiceCount();
$totalUsers = $dashboardObj->getTotalUserCount();
$totalOrder = $dashboardObj->getTotalOrderCount();
$avgOrderPrice = $dashboardObj->getAverageOrderTicket();
$maxOrderPrice = $dashboardObj->getHighestOrderTicket();

view('admin/dashboard', compact(
    'title',
    'logs',
    'totalCategory',
    'totalServices',
    'totalUsers',
    'totalOrder',
    'avgOrderPrice',
    'maxOrderPrice'
));
