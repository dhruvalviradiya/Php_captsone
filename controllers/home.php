<?php

use App\Models\Category;

$title  = 'home';
$heading = 'Unique Home Staging & Decor';

$categoryObj = new Category();
$categories = $categoryObj->getAll();


view('index', compact('title', 'heading', 'categories'));
