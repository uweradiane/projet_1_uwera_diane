<?php
session_start();
require_once '../functions/userCrud.php';
require_once '../functions/functions.php';
require_once '../utils/connexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body class="acceuilAdmin">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">


        <a class="navbar-brand" href="#">Diane fashion Design</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/profile.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/cart.php">Paniers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestionUser.php">gestionUsers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gestionProduct.php">gestionProduct</a>
                </li>
            </ul>
        </div>
    </nav>
    <center>
        <h3>Welcome to Diane Fashion Shop</h3>
    </center>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            </form>
        </div>

    </div>
    </div>
    </div>
    </div>

    </div>
    </div>
    </div>

</body>

</html>