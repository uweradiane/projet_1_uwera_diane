<?php
session_start();
//var_dump($_SESSION);
$user_name = '';
if (isset($_SESSION['signup_form']['user_name'])) {
    $user_name = $_SESSION['signup_form']['user_name'];
}
$email = '';
if (isset($_SESSION['signup_form']['email'])) {
    $email = $_SESSION['signup_form']['email'];
}
$pwd = '';
if (isset($_SESSION['signup_form']['pwd'])) {
    $pwd = $_SESSION['signup_form']['pwd'];
}
$fname = '';
if (isset($_SESSION['signup_form']['fname'])) {
    $fname = $_SESSION['signup_form']['fname'];
}
$lname = '';
if (isset($_SESSION['signup_form']['lname'])) {
    $lname = $_SESSION['signup_form']['lname'];
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: black;
            background-image: url("../images/backimage.jpg");
        }

        .signup-table {
            margin-top: 10px;
            width: 100%;
        }

        .signup-form {
            background-color: wheat;
            padding: 20px;
            border-radius: 10px;
        }

        .form-title {
            text-align: center;
            text-align: center;
        }
    </style>

</head>

<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Diane Fashion Design</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Accueil</a>
                </li>
            </ul>
        </div>
    </nav>
    <h2 class="text-center">Inscription</h2>
    <table class="table signup-table">
        <tbody>
            <tr>
                <td class="col-md-3"></td>
                <td class="col-md-3 signup-form">
                    <form class="row align-items-right" method="post" action="../utils/signupResult.php">
                        <fieldset>

                            <div class="mb-3">
                                <label for="userName" class="form-label"> UserName: </label>
                                <input type="text" class="form-control" style="width:30%" id="userName" name="user_name" value="">
                                <p style="color: blue; font-size: 0.9rem;" class="text-danger"><?php echo isset($_SESSION['signup_errors']['user_name']) ? $_SESSION['signup_errors']['user_name'] : '' ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="e_mail" class="form-label"> Email: </label>
                                <input type="text" class="form-control" style="width:30%" id="e_mail" name="email" value="">
                                <p style="color: blue; font-size: 0.9rem;" class="text-danger"><?php echo isset($_SESSION['signup_errors']['email']) ? $_SESSION['signup_errors']['email'] : '' ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="motDePasse" class="form-label"> PassWord: </label>
                                <input type="password" class="form-control" style="width:30%" id="motDePasse" name="pwd" value="">
                                <p style="color: blue; font-size: 0.9rem;" class="text-danger"><?php echo isset($_SESSION['signup_errors']['pwd']) ? $_SESSION['signup_errors']['pwd'] : '' ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="prenom" class="form-label"> First name: </label>
                                <input type="text" class="form-control" style="width:30%" id="prenom" name="fname" value="">
                                <p style="color: blue; font-size: 0.9rem;" class="text-danger"><?php echo isset($_SESSION['signup_errors']['fname']) ? $_SESSION['signup_errors']['fname'] : '' ?></p>
                            </div>

                            <div class="mb-3">
                                <label for="nom" class="form-label"> Last Name: </label>
                                <input type="text" class="form-control" style="width:30%" id="nom" name="lname" value="">
                                <p style="color: blue; font-size: 0.9rem;" class="text-danger"><?php echo isset($_SESSION['signup_errors']['lname']) ? $_SESSION['signup_errors']['lname'] : '' ?></p>
                            </div>

                            <div class="col-12">
                                <p> Do you have an Account?<a href="login.php">Log your session</a></p><br>
                                <button type="submit" class="btn btn-outline-primary" style="float:center">Signup</button>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                        </fieldset>
                    </form>
                </td>
                <td class="col-md-3"></td>
            </tr>
        </tbody>
    </table>

</body>

</html>