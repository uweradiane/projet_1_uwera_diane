<?php

require_once "../connections/connection.php";
require_once "../functions/userCrud.php";
require_once "../functions/validation.php";

session_start();
$connectedUser = getUserNameByID($_SESSION['auth']['id']);
$user = getUserByUserName($connectedUser['user_name']);


if (isset($_POST)) {
    var_dump($_POST);

    $_SESSION["update_form"] = $_POST;

    unset($_SESSION['update_errors']);

    $fieldIsValid = true;


    if (isset($user["user_name"])) {
        $validEmail = emailIsValid($_POST["email"]);

        if ($validEmail['isValid'] == false) {
            $fieldIsValid = false;
            // die("je die dans mon valid Email");
        }
    }


    if (isset($user["user_name"])) {
        $validfname = fnameIsValid($_POST["fname"]);

        if ($validfname['isValid'] == false) {
            $fieldIsValid = false;
            // die("je die dans mon valid Fname");
        }
    }
    if (isset($user["user_name"])) {
        $validlname = lnameIsValid($_POST["lname"]);

        if ($validlname['isValid'] == false) {
            $fieldIsValid = false;
            // die("je die dans mon valid Lname");
        }
    }

    if ($fieldIsValid == true) {
        //envoyer à la DB



        $data = [

            'user_name' => $user['user_name'],
            'email' => $_POST['email'],
            'pwd' => $user['pwd'],
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'billing_address_id' => 1,
            'shipping_address_id' => 1,
            'role_id' => $user['role_id'],
            'id' => $user['id']

        ];


        $updateUser = updateUser($data);
    } else {
        // redirect to signup et donner les messages d'erreur
        $_SESSION['update_errors'] = [
            'user_name' => $validUserName['msg'],
            'email' => $validEmail['msg'],
            'pwd' => $validpwd['msg'],
            'fname' => $validfname['msg'],
            'lname' => $validlname['msg']

        ];
        $url = './admin.php';
        header('Location: ' . $url);
    }
} else {
    //redirect vers signup
    $url = './admin.php';
    header('Location: ' . $url);
}
?>
<a href="../client.php">Retour</a>