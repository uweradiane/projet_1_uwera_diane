<?php
session_start();

// Check if the cart is not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

//  adding products to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $price = $_POST['price'];

    // Add the product to the cart
    addToCart($productId, $price);
}

//  removing product from the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_from_cart'])) {
    $productIdToRemove = $_POST['product_id'];

    // Remove the product from the cart
    removeFromCart($productIdToRemove);
}

// Function to add a product to the cart
function addToCart($productId, $price)
{
    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = ['quantity' => 1, 'price' => $price];
    } else {
        $_SESSION['cart'][$productId]['quantity']++;
    }
}

// Function to remove a product from the cart
function removeFromCart($productId)
{
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']--;

        // Check if quantity is zero or less
        if ($_SESSION['cart'][$productId]['quantity'] <= 0) {
            unset($_SESSION['cart'][$productId]);
        }

        // Check if the cart is empty after removing the product
        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <h2>Your Shopping Cart</h2>

        <?php
        // Display cart contents
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productId => $item) {
        ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $productId; ?></h5>

                        <?php
                        if (is_array($item) && isset($item['quantity']) && isset($item['price'])) {
                        ?>
                            <p class="card-text">Quantity: <?php echo $item['quantity']; ?></p>
                            <p class="card-text">Price: CA$<?php echo $item['price']; ?></p>
                            <form action="your_cart_page.php" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                <input type="submit" class="btn btn-danger" name="remove_from_cart" value="Remove">
                            </form>
                        <?php
                        }
                        ?>

                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>Your cart is empty.</p>";
        }
        ?>
        <form action="checkout.php" method="post">
            <input type="hidden" name="process_payment" value="1">
            <input type="submit" class="btn btn-primary" value="Pay Now"><br>
            <a href="../client.php">Add another product</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>

</html>