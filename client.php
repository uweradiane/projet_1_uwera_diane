<?php
require_once "./authantification/userAuthantification.php";
require_once "./functions/userCrud.php";
require_once "./connections/connection.php";

$products = afficherProduct();

session_start();

if (isset($_SESSION['auth'])) {
    $id = $_SESSION['auth']['id'];
    $athenticated = authenticated($_SESSION['auth']);
    $name = getUserNameByID($id);
    $role = $_SESSION['auth']['role_id'];
    $url = userIsAdmin($role);
} else {
    // Initialize an empty array to store selected products
    $_SESSION['selected_products'] = [];
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
        /* CSS styles*/
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

    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Your navigation bar content here -->
    </nav>

    <!-- Welcome message and logout button -->
    <h3 style="float: right;">
        <h2>Welcome<a class="nav-link" href=#><?php echo isset($_SESSION['auth']) ? $name['user_name'] : "" ?></a></h2>
    </h3>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="index.php">Diane Fashion Design</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../projet_1_uwera_diane/pages/profile.php">Client informations</a>
                </li>
            </ul>

        </div>
    </nav>

    <form method="post" action="./utils/logout.php">
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>

    <!-- Product listing -->
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($products as $product) { ?>
                    <form method="post" action="./pages/DetailsCommande.php">
                        <div class="col">
                            <div class="card shadow-sm" style="width: 18rem;">
                                <!-- Use hidden inputs to store product information -->
                                <input type="hidden" name="product_id" value="<?php echo intval($product['id']) ?>">
                                <input type="hidden" name="img_url" value="<?php echo $product['img_url'] ?>">
                                <input type="hidden" name="quantity" value="<?php echo $product['quantity'] ?>">
                                <input type="hidden" name="name" value="<?php echo $product['name'] ?>">
                                <input type="hidden" name="description" value="<?php echo $product['description'] ?>">
                                <input type="hidden" name="price" value="<?php echo intval($product['price']) ?>">

                                <img src="<?php echo $product['img_url'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text"><b><?php echo $product["name"] ?></b></p>
                                    <p class="card-text"><?php echo $product["description"] ?></p>
                                    <p class="card-text"><small class="text-muted"><?php echo intval($product["price"]) ?> $CAD</small></p>

                                    <label for="quantity">Quantity:</label>
                                    <input type="number" name="quantity" value="1" min="1" required>

                                    <!-- Add to cart button -->
                                    <button type="submit" class="btn btn-primary">Buy</button>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>