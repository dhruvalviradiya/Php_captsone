<?php
if ('POST' != $_SERVER['REQUEST_METHOD']) die('Unsupported request method');

use App\Lib\Validator;
use App\Models\User;

$user = new User();

// trim spaces from around values
foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}

$v = new Validator($_POST);
// test that required fields have values
$required = [
    'first_name',
    'last_name',
    'email',
    'phone',
    'street',
    'city',
    'postal_code',
    'province',
    'country',
    'password',
    'confirm_password',
];

$v->validateRequired($required);

// minimum length check
$v->validateMinLength('first_name', 3);
$v->validateMinLength('last_name', 3);
$v->validateMinLength('city', 3);
$v->validateMinLength('password', 6);

// maximum length check
$v->validateMaxLength('first_name', 60);
$v->validateMaxLength('last_name', 60);
$v->validateMaxLength('city', 60);
$v->validateMaxLength('province', 60);
$v->validateMaxLength('country', 60);
$v->validateMaxLength('postal_code', 7);
$v->validateMaxLength('password', 36);


// validate string
$v->validateString('first_name');
$v->validateString('last_name');

// email validation
$v->validateEmail('email');

// phone validation
$v->validatePhone('phone');

// postal code validation
$v->validatePostalCode('postal_code');

// password validation
$v->validatePassword('password');

//match confirm password with password
$v->validatePassword('password', 'confirm_password');

// unique email for registration 
if (
    count($v->getErrors()) == 0
    && !empty($user->getUserByEmail($_POST['email']))
) {
    $v->setError('email', ' already register with our system. Please reset password if needed!');
}
// step2 - if no errors, insert then redirect
if (empty($v->getErrors())) {
    //set newsletter field
    $_POST['subscribe_to_newsletter'] = isset($_POST['subscribe_to_newsletter']) ? 1 : 0;
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $_POST['phone'] = preg_replace('/[^0-9.]+/', '', $_POST['phone']);

    /* insert */

    $id = $user->create($_POST);

    if ($id) {
        $_SESSION['user_id'] = $id;
        setToastMsg('You have registered successfully.', 'success');
        header('Location: /?p=my-profile'); // GET request
        die;
    }
} else {
    $_SESSION['post'] = $_POST;
    $_SESSION['errors'] = $v->getErrors();
    setToastMsg('Please correct errors.', 'error');
    header('Location: /?p=sign-up'); // GET request
    die;
}
