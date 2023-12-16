<?php
function userNameIsValid(string $username): array
{
    $result = [
        "isValid" => true,
        "msg" => ""
    ];
    $userInDB = getUserByUsername($username);

    if (strlen($username) <= 2) {
        $result = [
            'isValid' => false,
            'msg' => 'The username you are used is very short'
        ];
    } elseif (strlen($username) > 20) {
        $result = [
            'isValid' => false,
            'msg' => 'The username you are used is very long'

        ];
    } elseif ($userInDB) {
        $result = [
            'isValid' => false,
            'msg' => 'The userName is already used'
        ];
    }
    return $result;
};
function emailIsValid($email)
{

    $email_validation_regex = "/^[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+\\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/";
    if (!preg_match($email_validation_regex, $email)) {
        return [
            'isValid' => false,
            'msg' => "format of the Email is invalide",
        ];
    }
    return [
        'isValid' => true,
        'msg' => '',
    ];
}
function pwdLenghtValidation($pwd)
{
    //minimum 8 max 16
    $length = strlen($pwd);

    if ($length < 8) {
        return [
            'isValid' => false,
            'msg' => 'Your password is very short. Have to be greater than 8 characters'
        ];
    } elseif ($length > 16) {
        return [
            'isValid' => false,
            'msg' => 'Your password is very long. Have to be smaller than 16 characters'
        ];
    }
    return [
        'isValid' => true,
        'msg' => ''
    ];
}
function fnameIsValid($fname)
{
    $result = [
        "isValid" => true,
        "msg" => ""
    ];

    if (strlen($fname) <= 2) {
        $result = [
            "isValid" => false,
            "msg" => "Your Last name is very short"
        ];
    } elseif (strlen($fname) >= 20) {
        $result = [
            "isValid" => false,
            "msg" => "Your First name is very long"
        ];
    }
    return $result;
}
function lnameIsValid($lname)
{
    $result = [
        "isValid" => true,
        "msg" => ""
    ];

    if (strlen($lname) <= 2) {
        $result = [
            "isValid" => false,
            "msg" => "Your Last name is very short"
        ];
    } elseif (strlen($lname) >= 20) {
        $result = [
            "isValid" => false,
            "msg" => "Your Last is very long"
        ];
    }
    return $result;
}
