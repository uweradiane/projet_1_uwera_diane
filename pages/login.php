<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <style>
        body {
            background-image: url("images/IMG.jpg");
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand"> Diane Fashion Design</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./signup.php">Save</a>
                </li>
            </ul>
        </div>
    </nav>
    <form method="post" action="../utils/loginResult.php">
        <label for="user_name">UserName</label>
        <input id="user_name" type="text" name="user_name" value="">
        <p style="color: blue; font-size: 0.9rem;" class="text-danger"><?php echo isset($_SESSION['login_errors']['error_username']) ? "Le nom d'utilisateur n'existe pas" : '' ?></p>
        <label for="pwd">Password</label>
        <input id="pwd" type="password" name="pwd" value="">
        <p style="color: blue; font-size: 0.9rem;" class="text-danger"><?php echo isset($_SESSION['login_errors']['error_pwd']) ? "Mot de passe invalide" : '' ?></p>
        <p> Don't you have any Account?<a href="signup.php">Create Account</a></p><br>
        <button type="submit" class="btn btn-success">Login</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>