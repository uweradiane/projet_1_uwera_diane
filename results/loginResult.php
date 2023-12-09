<?php
session_start();
require_once '../utils/connection.php';
require_once '../functions/userCrud.php';
require_once '../functions/function.php';
require_once '../functions/validation.php';

var_dump($_SESSION);
$user_name = '';
if (isset($_SESSION['login_form']['user_name'])) {
    $user_name = $_SESSION['login_form']['user_name'];
}

$pwd = '';
if (isset($_SESSION['login_form']['pwd'])) {
    $pwd = $_SESSION['login_form']['pwd'];
}

// Authentication
if (isset($_POST['user_name']) && isset($_POST['pwd'])) {
    // Check if username is in the DB
    if (!empty($_POST['user_name'])) {
        $userData = getUserByUsername($_POST['user_name']);
    } else {
        // Error: nothing entered
        // Redirect to login
        $url = '../pages/login.php';
        header('Location: ' . $url);
        exit();
    }

    $token = hash('sha256', random_bytes(32));
    echo '</br></br>Mon token : </br>';
    // If the user exists in the DB
    if ($userData) {
        // Compare password with DB (encoded version)
        $enteredPwdEncoded = encodePwd($_POST['pwd']);

        if ($userData['pwd'] == $enteredPwdEncoded) {
            // Correct password
            // Create a token
            $data = [
                'token' => $token,
                'id' => $userData['id']
            ];
            $updateToken = updateUser($data);

            $_SESSION['authentification'] = [
                'id' => $userData['id'],
                'role_id' => $userData['role_id'],
                'token' => $token
            ];
            var_dump($_SESSION['authentification']);

            var_dump($token);
            // Save the token in Session and in the DB

            echo "C'est le bon mdp ";
        } else {
            // Incorrect password
            $_SESSION['errorLogin'] = [
                'user_name' => $userData['message'],
                'pwd' => 'mot de passe incorrect '
            ];

            $url = '../pages/login.php';
            header('location:' . $url);
            exit();
        }
    } else {
        // User not found in the DB
        $_SESSION['errorLogin'] = [
            'user_name' => 'Utilisateur non trouvé',
            'pwd' => 'mot de passe incorrect '
        ];

        $url = '../pages/login.php';
        header('location:' . $url);
        exit();
    }
} else {
    // Form not submitted
    $url = '../pages/address.php';
    header('location:' . $url);
    exit();
}

// Rest of your code...
?>
<a href="./pages/homepage.php">homepage</a>