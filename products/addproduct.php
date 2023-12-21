<?php
require_once "../connections/connection.php";
require_once "../functions/userCrud.php";
session_start();


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="../styles/product.css">
<nav class="navbar navbar-expand-lg navbar-light bg-success">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link " href="../index.php">Accueil</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " href="./product.php">Product</a>
            </li>
        </ul>
    </div>
</nav>
<form method="post" action="./productResult.php">
    <fieldset>
        <legend>
            <h3 class="text text-align-center text-color-primary">Add product</h3>
        </legend>
        <div class="row">
            <div class="col-md-3">
                <label for="nomprod">Name</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="name" id="nomprod" placeholder="Nom du produit" value="">
                <p class="text-danger"><?php echo isset($_SESSION['errors']['name']) ? $_SESSION['errors']['name'] : '' ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="quantite">Quantity</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="quantity" id="quatity" placeholder="Combien de produit y'a t'il" value="">
                <p class="text-danger"><?php echo isset($_SESSION['errors']['quantity']) ? $_SESSION['errors']['quantity'] : '' ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="prix">Price</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="price" id="price" placeholder="Combien vaut le produit" value="">
                <p class="text-danger"><?php echo isset($_SESSION['errors']['price']) ? $_SESSION['errors']['price'] : '' ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="image">Image</label>
            </div>
            <div class="col-md-3">
                <input type="text" name="img_url" id="image" placeholder="Entrez l'url de l'image" value="">
                <p class="text-danger"><?php echo isset($_SESSION['errors']['img_url']) ? "Besoin d'une url" : '' ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="desc">Description </label>
            </div>
            <div class="col-md-6">
                <textarea class="card card-body" id="desc" name="description" placeholder="Description du produit" value=""></textarea>
                <p class="text-danger"><?php echo isset($_SESSION['errors']['description']) ? "Besoin d'une description" : '' ?></p>
            </div>
        </div>
        <div>
            <button class="btn btn-outline-success" type="submit">Add</button>
        </div>

    </fieldset>
</form>