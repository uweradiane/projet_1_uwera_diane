<?php
session_start();
require_once("../connections/connection.php"); // Include your database connection file

function calculateTotalAmount()
{
    $totalAmount = 0;

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId => $item) {
            $totalAmount += $item['quantity'] * $item['price'];
        }
    }

    return $totalAmount;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["process_payment"])) {
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        echo "Your cart is empty. Add items before proceeding to checkout.";
    } else {
        $totalAmount = calculateTotalAmount();

        // Here, you would typically integrate with a payment gateway like Stripe or PayPal
        // For simplicity, we'll just display a success message
        echo "Payment successful. Total Amount: CA$" . $totalAmount;

        // Clear the cart after successful payment
        unset($_SESSION['cart']);
    }
}
?><br>
<br>
<br>
<a href="address.php">Add Adress</a>