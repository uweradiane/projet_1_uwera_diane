<?php
//require all functions
require_once "../functions/function.php";
require_once "../functions/userCrud.php";
require_once "../functions/validation.php";
require_once "../connections/connection.php";
session_start();
$token = hash('sha256', random_bytes(32));

if (isset($_POST)) {

    //url de reirection
    $url = '../pages/login.php';

    unset($_SESSION['login_errors']);

    if (!empty($_POST['user_name'])) {
        $userIsPresent = getUserByUserName($_POST['user_name']);
    } else {
        //Erreur rien entré
        echo "<p> fill the case of identification";
        //redirect vers login

        header('Location: ' . $url);
    }

    if ($userIsPresent) {
        $enteredPassword = encodePwd($_POST['pwd']);
        $data = [

            'token' => $token,
            'id' => $userIsPresent['id'],
        ];
        // add token in the database
        $addgeneratedToken = updateToken($data);
        if ($userIsPresent['pwd'] == $enteredPassword) {
            $_SESSION['auth'] = [
                'id' => $userIsPresent['id'],
                'role_id' => $userIsPresent['role_id'],
                'token' => $userIsPresent['token']

            ];
            //send to the database
            $data = [
                'user_name' => $_POST['user_name'],
                'token' => $_SESSION['auth']['token']
            ];
            updateToken($data);

            var_dump($_SESSION['auth']);
            if ($_SESSION['auth']['role_id'] == 3) {
                echo "<a class='btn btn-success' href=../client.php> Client Account</a>";
            } else {
                echo "<a class='btn btn-success' href='../pages/admin.php'> Admin Account</a>";
            }
        } else {
            $_SESSION['login_errors'] = [
                'error_pwd' => true
            ];

            header('Location: ' . $url);
        }
    } else {
        $_SESSION['login_errors'] = [
            'error_username' => true
        ];

        header('Location: ' . $url);
    }
} else {
    //redirect vers login

    header('Location: ' . $url);
}
