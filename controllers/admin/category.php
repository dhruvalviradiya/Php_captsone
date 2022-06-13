<?php

use App\Models\Category;

$title = 'Category';
$categoryObj = new Category();
$categories = $categoryObj->getAll(/*order by*/'desc');

view('admin/category', compact('title', 'categories'));
