<?php
require_once "../products/productCrud.php";
require_once "../connections/connection.php";
require_once "../functions/userCrud.php";
require_once "../products/validation.php";
session_start();
if (isset($_POST)) {
    $numProducts = $_SESSION['productnumber'];
    // filters the selected products and adds them to the Shopping Cart
    $user_id = $_POST['user_id'];
    for ($i = 1; $i <= $numProducts; $i++) {
        $data = [
            'id' => $_POST['id' . $i],
            'quantity' => $_POST['quantity' . $i],
            'name' => $_POST['name' . $i],
            'price' => $_POST['price' . $i],
        ];
        if (!empty($data['quantity'])) {
            $shoppingCart[] = $data;
        }
    }
    var_dump($shoppingCart);
    // how many tables are in the ShoppingCart
    $imax = count($shoppingCart);

    // keeps the user's shopping cart
    $_SESSION['cart'] = [
        'user_id' => $user_id,
        'shoppingCart' => $shoppingCart
    ];

    var_dump($_SESSION['cart']['shoppingCart']);
}
?>
<a href="../client.php">Client Account</a>