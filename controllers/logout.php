<?php

if (isUserLoggedIn()) {
    unset($_SESSION['user_id']);
    unset($_SESSION['admin']);
    session_regenerate_id();
    setToastMsg('You have successfully logged out', 'success');
    header('Location:/');
    die;
}

setToastMsg('Are you sure you are logged in?', 'info');
header('Location:/?p=login');
die;
