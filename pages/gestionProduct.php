<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionProduit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body class="acceuilAdmin">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">


        <a class="navbar-brand" href="#">Diane Fashion Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">cart</a>
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


    <form method="post" action="./addproduct.php" class="form">
        <fieldset>
            <legend>Add product</legend>
            <div>
                <label for="name">Name of product</label>
                <input id="name" type="text" name="name">
            </div><br>
            <div>
                <label for=" quantity">quantity : </label>
                <input id="quantity" type="number" name="quantity">
            </div><br>
            <div>
                <label for="price">Price : </label>
                <input id="price" type="number" name="price">
            </div><br>
            <div class="row">
                <div class="col-md-3">
                    <label for="image">Image</label>
                </div>
                <div class="col-md-3">
                    <input type="file" name="image" id="image">
                    <p class="text-danger"><?php echo isset($_SESSION['errors']['img_url']) ? "Besoin d'une image" : '' ?></p>
                </div>
            </div>

            <div>
                <label for="description">Description</label>
                <input id="description" type="text" name="description">

            </div><br>
        </fieldset>
        <input type="submit" value="Add product">
    </form>
    <br><br>
    <form class="form" action="./deleteProduct.php" method="post">

        <fieldset>
            <legend>delete the product</legend>
            <label for="name">name of product</label>
            <input type="text" id="name" name="name"><br>

            <input type="submit" value="Supprimer">

        </fieldset>
    </form>
</body>

</html>