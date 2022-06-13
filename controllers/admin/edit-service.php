<?php

if (empty($_GET['id'])) die('Must provide id to edit record');

if (intval($_GET['id']) != $_GET['id']) die('Service Id must be an integer');

use App\Models\Category;
use App\Models\Service;

$categoryObj = new Category();
$categories = $categoryObj->getAll(/*order by*/'desc');
$serviceObj = new Service();
$service = $serviceObj->getOne($_GET['id']);
$title = 'Edit Services';

view('admin/edit-service', compact('title', 'post', 'errors', 'categories', 'service'));
