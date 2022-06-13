<?php

use App\Models\User;

$title = 'Users';
$userObj = new User();
$users = $userObj->getAll(/*order by*/'desc');

view('admin/users', compact('title', 'users'));
