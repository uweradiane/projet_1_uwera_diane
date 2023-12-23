<?php
require_once "./authantification/userAuthantification.php";
require_once "./functions/userCrud.php";
require_once "./connections/connection.php";
session_start();
if (isset($_SESSION['auth'])) {
    $id = $_SESSION['auth']['id'];
    $athenticated = authenticated($_SESSION['auth']);
    $name = getUserNameByID($id);
    $role = $_SESSION['auth']['role_id'];
    //$product = productManagement($role);
    $url = userIsAdmin($role);
} else {
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">





</head>

<body>
    <style>
        body {
            background-color: grey;
            margin: 50px 0px;
            padding: 0px;
            text-align: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("images/background.jpg");
        }

        label,
        input {
            display: block;
            width: 150px;
            float: left;
            margin-bottom: 10px;
        }

        label {
            text-align: right;
            width: 95px;
            padding-right: 20;
        }

        br {
            clear: left;
        }

        form {
            display: inline-block;
        }

        nav {
            background-color: grey;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="index.php">Diane Fashion Design</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="./pages/login.php">Login</a>
                </li>


            </ul>
        </div>
    </nav>


    <form>
        <fieldset>
            <legend>
                <p class="text-primary">to Diane Fashion shop.</p>
            </legend>


        </fieldset>
    </form>
    <form method="post" action="./utils/logout.php">
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</body>

</html>