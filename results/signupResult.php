<a href="../">Accueil</a>
<?php
require_once '../utils/connection.php';
require_once '../functions/validation.php';
require_once '../functions/userCrud.php';
require_once '../functions/function.php';
require_once '../functions/validation.php';
session_start();

// Todo : valider les données de mon form 
// si les données ne sont pas bonne : renvoyer vers le form d'enregistrement (redirect auto )
// attention on veut récupérer les données rentrées précédement : $_SESSION




if (isset($_POST)) {
    $_SESSION['signup_form'] = $_POST;

    unset($_SESSION['signup_errors']);

    $fieldValidation = true;
    // valid user name
    if (isset($_POST['user_name'])) {
        $nameIsValidData = usernameIsValid($_POST['user_name']);

        if ($nameIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }

    //valid email
    if (isset($_POST['user_name'])) {
        $emailIsValidData = emailIsValid($_POST['email']);

        if ($emailIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }
    // valid mdp
    if (isset($_POST['user_name'])) {
        $pwdIsValidData = pwdLenghtValidation($_POST['pwd']);

        if ($pwdIsValidData['isValid'] == false) {
            $fieldValidation = false;
        }
    }

    if ($fieldValidation == true) {
        //envoyer à la DB

        $encodedPwd = encodePwd($_POST['pwd']);
        $data = [
            'user_name' => $_POST['user_name'],
            'email' => $_POST['email'],
            'pwd' => $encodedPwd,
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'billing_address_id' => 1,
            'shipping_address_id' => 1,
            'token' => "",
            'role_id' => 3

        ];
        var_dump($data);
        $newUser = createUser($data);

        //redirect to login (on est enregistre on veut maintenant se log)
        //redirect vers signup
        //$url = '../pages/login.php';
        //header('Location: ' . $url);
    } else {
        // redirect to signup et donner les messages d'erreur
        $_SESSION['signup_errors'] = [
            'user_name' => $nameIsValidData['msg'],
            'email' => $emailIsValidData['msg'],
            'pwd' => $pwdIsValidData['msg'],
            'fname' => $fnameIsValidData['msg'],
            'lnmame' => $lnameIsValidData['msg']
        ];
        $url = '../pages/signup.php';
        header('Location: ' . $url);
    }
} else {
    //redirect vers signup
    $url = '../pages/signup.php';
    header('Location: ' . $url);
}

?>