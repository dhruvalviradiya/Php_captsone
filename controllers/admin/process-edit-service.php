<?php

if ('POST' != $_SERVER['REQUEST_METHOD']) die('Unsupported request method');

if (empty($_REQUEST['id'])) die('Please select an employee to edit');

if (intval($_REQUEST['id']) != $_REQUEST['id']) die('Employee id must be an integer');

use App\Lib\Validator;
use App\Models\Service;

$service = new Service();

// trim spaces from around values
foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}

$v = new Validator($_POST);

// test that required fields have values
$required = [
    'category',
    'title',
    'description',
    'short_description',
    'display',
    'price',
    'estimated_time',
    'no_of_staff_required',
    'tag'
];
$_SESSION['payload'] = $_POST;
$v->validateRequired($required);

// minimum length check
$v->validateMinLength('title', 2);
$v->validateMinLength('short_description', 5);
$v->validateMinLength('description', 10);
$v->validateMinLength('tag', 3);

// maximum length check
$v->validateMaxLength('title', 255);
$v->validateMaxLength('short_description', 255);
$v->validateMaxLength('tag', 255);

// validate string
$v->validateString('title');
$v->validateString('short_description');

// validate numbers
$v->validateNumbersOnly('estimated_time');
$v->validateNumbersOnly('no_of_staff_required');
$v->validatePrice('price');

// validate image file
if ($_FILES && count($_FILES) && $_FILES['image'] &&  $_FILES['image']['name']) {
    $v->validateImageFile($_FILES, 'image');
}

// step2 - if no errors, insert then redirect
if (empty($v->getErrors())) {

    if ($_FILES && count($_FILES) && $_FILES['image'] &&  $_FILES['image']['name']) {
        $tmp_name = $_FILES['image']['tmp_name'];
        $file_name = uniqid() . '_' . $_FILES['image']['name'];
        $save_path = __DIR__ . '/../../public/images/service/' . $file_name;
        move_uploaded_file($tmp_name, $save_path);
        $_POST['file_name'] = $file_name;
    } else {
        $_POST['file_name'] = $_POST['service_image'];
    }
    /* update */
    $serviceObj = new Service();
    if ($serviceObj->update($_POST)) {
        setToastMsg('Service has been updated successfully.', 'success');
        header('Location: /admin/?p=services'); // GET request
        die;
    } else {
        $_SESSION['post'] = $_POST;
        $_SESSION['errors'] = $v->getErrors();
        setToastMsg('Something went wrong please try again later', 'error');
        header(
            'Location: ' . $_SERVER['HTTP_REFERER']
        );
        die;
    }
} else {
    $_SESSION['post'] = $_POST;
    $_SESSION['errors'] = $v->getErrors();
    setToastMsg('Please correct errors.', 'error');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die;
}
