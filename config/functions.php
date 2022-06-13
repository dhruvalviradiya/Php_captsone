<?php

/** Our Utility Functions */

/**
 * format address using all details
 *
 * @param string $street
 * @param string $city
 * @param string $province
 * @param string $postal_code
 * @param string $country
 * @return string
 */
function formatAddress(string $street = '', string $city = '', string $province = '', string $postal_code = '', string $country = ''): string
{
    $address = '';
    $address =  $street ?  $street . ', ' : '';
    $address =  $city ? $address . $city . ', ' : $address;
    $address =  $province ? $address .  $province . ', ' : $address;
    $address =  $postal_code ? $address . $postal_code . ', ' : $address;
    $address =  $country ? $address . $country  : $address;
    return  $address ?? '';
}


/**
 * load view with data
 *
 * @param string $view_name
 * @param array $data
 * @return void
 */
function view(string $view_name, array $data = []): void
{
    try {
        extract($data);
        $path = __DIR__ . '/../views/' . $view_name . '.view.php';
        if (!file_exists($path)) {
            throw new Exception('View' . $path . 'Not Found');
        }
        require($path);
    } catch (Exception $e) {
        echo $e->getMessage();
        die;
    }
}
/**
 * setToastMsg detail in session
 *
 * @param string $msg
 * @param string $type
 * @return void
 */
function setToastMsg(string $msg, string $type): void
{
    $_SESSION['toast']['msg'] = $msg;
    $_SESSION['toast']['type'] = $type;
}

/**
 * to check user logged in or not function
 *
 * @return boolean
 */
function isUserLoggedIn(): bool
{
    if (isset($_SESSION['user_id']) && $_SESSION['user_id']) {
        return true;
    } else {
        return false;
    }
}
/**
 * to check is admin login
 *
 * @return boolean
 */
function isAdmin(): bool
{
    if (isUserLoggedIn() && isset($_SESSION['admin']) && $_SESSION['admin']) {
        return true;
    } else {
        return false;
    }
}
/**
 * log function
 *
 * @param App\Lib\Interfaces\ILogger $logger
 * @param string $event
 * @return void
 */
function logEvent(App\Lib\Interfaces\ILogger $logger, string $event = '')
{
    if (empty($event)) {
        $event = date("Y-m-d H:i:s") . ' | ' . $_SERVER['REQUEST_METHOD'] . ' | ' . $_SERVER['REQUEST_URI']
            . ' | ' .  http_response_code() . ' | ' . $_SERVER['HTTP_USER_AGENT'];
    } else {
        // append timestamp with custom log
        $event
            = date("Y-m-d H:i:s") . ' | ' . $event;
    }
    $logger->write($event);
}

/**
 * dump and die function
 *
 * @param [type] $var
 * @return void
 */
function dd($var = null)
{
    echo '<pre>';
    var_dump($var);
    die;
}

/**
 * get csrf token function
 *
 * @return csrf token 
 */
function csrf()
{
    return $_SESSION['csrf_token'];
}
/**
 * GET VALUE OF ATTRIBUTES FROM POST OR DATABASE
 *
 * @param [type] $post
 * @param [type] $item
 * @param [type] $field
 * @return value
 */
function getAttrValue($post, $item, $field)
{
    if (isset($post[$field]) && $post[$field]) {
        return $post[$field];
    } elseif (isset($item[$field]) && $item[$field]) {
        return $item[$field];
    }
    return '';
}
