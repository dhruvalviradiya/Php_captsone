<?php

use App\Models\User;

$user = new User();

$title = 'my profile';

if (empty($_SESSION['user_id']) || (intval($_SESSION['user_id']) != $_SESSION['user_id'])) {
    setToastMsg('Something went wrong. Please contact to admin!', 'error');
}

$id = $_SESSION['user_id'];

$result = $user->getOne($id);

view('my-profile', compact('title', 'result'));
