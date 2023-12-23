<?php
require_once "../connnections/connection.php";
require_once "../functions/userCrud.php";
require_once "../products/productcrud.php";

session_start();
$allProducts = getAllProducts();

$numProducts = count($allProducts);
var_dump($numProducts);
$_SESSION['nombreProduit'] = $numProducts;
if (isset($_SESSION['auth'])) {
    $id = $_SESSION['auth']['id'];
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div class="row">
    <div class=col-md-1>
        <img src="../Saved Pictures/iconeSoleil.jpg" class="img-circle" width="80" height="70" />
    </div>
    <div class="col-md-8">
        <h1 class="heading"> Diane Fashion Design</h1>
    </div>
    <div class="col-md-1">

        <a href="../client.php">
            <h1>Acceuil</h1>
        </a>
    </div>
</div>
<form method="post" action="../panier/getProducts.php">
    <div class="container">
        <?php foreach ($allProducts as $product) {

        ?>
            <div class="row" id="content">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h3 class="title"> <br><?php echo $product['name']; ?><h3>
                                <br><?php echo $product['price']; ?>CAD
                                <input type=" number" name="user_id" value="<?php echo $id ?>" hidden>
                                <input type="number" name="id<?php echo $product['id'] ?>" value="<?php echo $product['id'] ?>" hidden>
                                <input type="text" name="name<?php echo $product['id'] ?>" value="<?php echo $product['name'] ?>" hidden>
                                <input type="number" name="price<?php echo $product['id'] ?>" value="<?php echo $product['price'] ?>" hidden>
                                <br><?php echo $product['description']; ?>
                                <br />
                                <label for="nombre">Number of clothes</label>
                                <input type="text" id="nombre" name="quantity<?php echo $product['id'] ?>" value="">
                                <br />
                                <button class=" btnOrder" type=" submit">Order</button>
                    </div>
                </div>
            </div>

        <?php }
        ?>



</form>