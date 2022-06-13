<?php


if ('POST' != $_SERVER['REQUEST_METHOD']) die('Unsupported request method');

use App\Lib\Validator;
use App\Models\User;

$userObj = new User();

// trim spaces from around values
foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}
$v = new Validator($_POST);

// test that required fields have values
$required = [
    'email',
    'password'
];

$v->validateRequired($required);

// email validation
$v->validateEmail('email');

// password validation
$v->validateMinLength('password', 6);
$v->validateMaxLength('password', 36);

// step2 - if no errors, insert then redirect

if (count($v->getErrors()) == 0) {
    $user = $userObj->getUserByEmail($_POST['email']);

    if (!empty($user)) {
        if (!password_verify($_POST['password'], $user['password'])) {
            setToastMsg('Sorry, those credentials do not match our records.', 'error');
            header('Location: /?p=login');
            die;
        }
        setToastMsg("Welcome back, $user[first_name]  $user[last_name].  You have logged in successfully.", 'success');
        session_regenerate_id();
        $_SESSION['user_id'] = $user['id'];

        logEvent($databaseLogger, 'User Logged in with ' . $_POST['email']);

        if ($user['admin']) {
            $_SESSION['admin'] = 1;
            header(
                'Location: /admin/'
            ); // GET request
            die;
        } else {
            $_SESSION['admin'] = 0;
            if (isset($_SESSION['target'])) {
                header('Location:/?p=' . $_SESSION['target']);
                unset($_SESSION['target']);
                die;
            }
            header(
                'Location: /?p=my-profile'
            ); // GET request
            die;
        }
    } else {
        $_SESSION['post'] = $_POST;
        $_SESSION['errors'] = $v->getErrors();
        setToastMsg('Sorry, entered email not found in our records.', 'error');
        header('Location: /?p=login'); // GET request
    }
} else {
    $_SESSION['post'] = $_POST;
    $_SESSION['errors'] = $v->getErrors();
    setToastMsg('Please correct errors.', 'error');
    header('Location: /?p=login'); // GET request
    die;
}
