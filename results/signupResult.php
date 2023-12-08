<a href="../">Accueil</a>
<?php
require_once '../functions/validation.php';
require_once '../functions/userCrud.php';
require_once '../functions/function.php';
require_once '../utils/connection.php';
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
            'lname' => $_POST['lname']
        ];
        $newUser = createUser($data);
    } else {
        // redirect to signup et donner les messages d'erreur
        $_SESSION['signup_errors'] = [
            'user_name' => $nameIsValidData['msg'],
            'email' => $emailIsValidData['msg'],
            'pwd' => $pwdIsValidData['msg'],
            'fname'=>$fnameIsValidData['msg'],
            'lnmae'=>$lnameIsValidData['msg']
        ];
        $url = '../pages/signup.php';
        header('Location: ' . $url);
    }
} else {
    //redirect vers signup
    $url = '../pages/signup.php';
    header('Location: ' . $url);
}
var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST["user_name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the submitted data, checking if the keys exist
        $user_name = isset($_POST["user_name"]) ? $_POST["user_name"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["pwd"]) ? $_POST["pwd"] : "";
        $fname = isset($_POST["fname"]) ? $_POST["fname"] : "";
        $lname = isset($_POST["lname"]) ? $_POST["lname"] : "";
        $billing_address_id = isset($_POST["billing_address_id"]) ? $_POST["billing_address_id"] : 0;
        $shipping_address_id = isset($_POST["shipping_address_id"]) ? $_POST["shipping_address_id"] : 0;
        $token = isset($_POST["token"]) ? $_POST["token"] : 0;
        $role_id = isset($_POST["role_id"]) ? $_POST["role_id"] : 3;

        // Insert data into the database
        $sql = "INSERT INTO user(user_name, email, pwd, fname, lname, billing_address_id, shipping_address_id, token, role_id) 
        VALUES ('$user_name', '$email', '$password', '$fname', '$lname', $billing_address_id, $shipping_address_id, $token, 3)";

// $conn is your database connection)
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
}
}
?>













// Todo : traiter les données de mon form
// envoyer les données dans la DB
