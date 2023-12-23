<?php

// Check if the cart is not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

//  adding products to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Add the product to the cart
    addToCart($productId, $price, $quantity);
}

//  removing product from the cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_from_cart'])) {
    $productIdToRemove = $_POST['product_id'];

    // Remove the product from the cart
    removeFromCart($productIdToRemove);
}

// Function to add a product to the cart
function addToCart($productId, $price, $quantity)
{
    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = ['quantity' => $quantity, 'price' => $price];
    } else {
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
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
