<?php

namespace App\Lib;

class Validator
{
    // Name: Dhruval Viradiya
    // Email: dhruvalviradiya@gmail.com

    /**
     * array of fields
     *
     * @var array
     */
    private $array;

    /**
     * Array of errors in key/pair value
     *
     * @var array
     */
    private $errors = [];

    public function __construct(array $array)
    {
        $this->array = $array;
    }
    /**
     * validate string
     *
     * @param string $field
     * @return void
     */
    public function validateString(string $field): void
    {
        if (
            !preg_match('/^[A-z0-9\s\-\,\']{1,255}$/', $this->array[$field])
        ) {
            $this->setError($field, 'is contains invalid characters');
        }
    }

    /**
     * To check all required field
     *
     * @param array $required
     * @return void
     */
    public function validateRequired(array $required): void
    {
        foreach ($required as $field) {
            if (empty($this->array[$field])) {
                $this->setError($field, 'is a required field');
            }
        }
    }

    /**
     * validate email
     *
     * @param string $field
     * @return void
     */
    public function validateEmail(string $field): void
    {
        if (!filter_var($this->array[$field], FILTER_VALIDATE_EMAIL)) {
            $this->setError($field, 'must be a valid email');
        }
    }

    /**
     * validate phone number
     *
     * @param string $field
     * @return void
     */
    public function validatePhone(string $field): void
    {
        $pattern = '/^([\(][0-9]{3}[\)]|[0-9]{3})[- .][0-9]{3}[-.][0-9]{4}$/';
        $pattern2 = '/^[0-9]{10}$/';
        if (
            !preg_match($pattern, $this->array[$field]) &&
            !preg_match($pattern2, $this->array[$field])
        ) {
            $this->setError($field, 'is not valid phone number');
        }
    }

    /**
     * postal code validation
     *
     * @param string $field
     * @return void
     */
    public function validatePostalCode(string $field): void
    {
        $pattern = '/^[a-zA-Z]\d[a-zA-Z]\ {0,1}\d[a-zA-Z]\d$/';
        if (!preg_match($pattern, $this->array[$field])) {
            $this->setError($field, 'is not valid postal code');
        }
    }

    /**
     * validate minimum required length of string
     *
     * @param string $field
     * @param integer $value
     * @return void
     */
    public function validateMinLength(string $field, int $value): void
    {
        if (strlen($this->array[$field]) < $value) {
            $this->setError($field, "must contain at least ${value} characters");
        }
    }

    /**
     * * validate maximum length of string
     *
     * @param string $field
     * @param integer $value
     * @return void
     */
    public function validateMaxLength(string $field, int $value): void
    {
        if (strlen($this->array[$field]) > $value) {
            $this->setError($field, "can not have more than ${value} characters");
        }
    }

    /**
     * password validation
     *
     * @param string $field
     * @return void
     */
    public function validatePassword(string $field): void
    {
        $pattern = '/^[A-z0-9\@\#\$\&\%]{1,36}$/';
        if (!preg_match($pattern, $this->array[$field])) {
            $this->setError($field, 'contains invalid characters');
        }
    }

    /**
     * match two string
     *
     * @param string $field
     * @return void
     */
    public function validateMatch(string $field1, string $field2): void
    {
        if ($this->array[$field1] != $this->array[$field2]) {
            $this->setError($field2, 'does not matching with' . $this->label($field1));
        }
    }
    /**
     * validate numbers only
     *
     * @param array $files array of files
     * @param string $field name of field
     * @return void
     */
    public function validateNumbersOnly(string $field): void
    {
        if (!preg_match("/^[0-9]*$/", $this->array[$field])) {
            $this->setError($field, 'should only contains numbers');
        }
    }
    /**
     * validate numbers with length
     *
     * @param string $field
     * @param string $length 
     * @param string $msg error message
     * @return void
     */
    public function validateNumbersWithLength(string $field,  string $length = '', string $msg = ''): void
    {
        if (!preg_match("/^[0-9]*$/",  $this->array[$field])) {
            $this->setError($field, 'should only contains numbers');
        } else if (!preg_match("/^[0-9]{{$length}}$/",  $this->array[$field])) {
            $this->setError($field, "must contains {$msg}");
        }
    }
    /**
     * validate price
     *
     * @param string $field
     * @return void
     */
    public function validatePrice(string $field): void
    {
        if (!preg_match("/^\d{1,8}(?:\.\d{1,4})?$/",  $this->array[$field])) {
            $this->setError($field, 'is not valid price');
        }
    }
    /**
     * validate image file
     *
     * @param array $files array of files
     * @param string $field name of field
     * @return void
     */
    public function validateImageFile(array $files, string $field): void
    {
        if (!empty($files[$field]['name'])) {
            $img_data = getimagesize($files[$field]['tmp_name']);
            if (!$img_data) {
                $this->setError($field, " : The file you uploaded was not an image");
            } else {
                $allowed = [
                    'image/jpg',
                    'image/jpeg',
                    'image/gif',
                    'image/webp',
                    'image/png'
                ];

                $mime = $img_data['mime'] ?? false;

                if (!$mime || !in_array($mime, $allowed)) {
                    $this->setError($field, " : Sorry, incompatible image format");
                }
            }
        } else {
            $this->setError($field, " is required field");
        }
    }



    /* Utility Functions
    **********************************/

    /**
     * set error in error property
     *
     * @param string $field
     * @param string $msg
     * @return void
     */
    public function setError(string $field, string $msg): void
    {
        $this->errors[$field][] = $this->label($field) . ' ' . $msg;
    }

    /**
     * format label  
     *
     * @param string $field
     * @return string formatted label
     */
    private function label(string $field): string
    {
        return ucwords(str_replace('_', ' ', $field));
    }

    /**
     * getter of errors property
     * return errors property
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
