<?php

use App\Models\Category;

$categoryObj = new Category();
$categories = $categoryObj->getAll(/*order by*/'desc');
$title = 'Add Services';

view('admin/add-service', compact('title', 'post', 'errors', 'categories'));
