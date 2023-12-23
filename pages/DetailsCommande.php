<?php
session_start();
require_once '../functions/userCrud.php';
require_once '../functions/function.php';
require_once '../connections/connection.php';
require_once 'shopping_cart_functions.php'; // Include the path to your shopping cart functions

// Check if the required keys are set in $_POST before using them
$idProduct = isset($_POST["product_id"]) ? getProductById(intval($_POST["product_id"])) : null;
$price = isset($idProduct["price"]) ? intval($idProduct["price"]) : 0;
$quantity = isset($_POST["quantity"]) ? intval($_POST["quantity"]) : 0;
$priceT = $price * $quantity;
$id_client = isset($_SESSION["auth"]["id"]) ? intval($_SESSION["auth"]["id"]) : 0;
$data1 = [
    'date' => date('Y-m-d H:i:s'),
    'total' => $priceT,
    'user_id' => $id_client
];
$recIdUserProduct = getUserOrderById($id_client);

$data = [
    'product_id' => isset($_POST["product_id"]) ? $_POST["product_id"] : null,
    'quantity' => isset($_POST["quantity"]) ? $_POST["quantity"] : null,
    'price' => $priceT
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head content here -->
</head>

<body>
    <!-- Your navigation bar and other HTML content -->


    </tbody>
    </table>

    <form action="your_cart_page.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo isset($_POST["product_id"]) ? $_POST["product_id"] : ''; ?>">
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        <input type="hidden" name="quantity" value="<?php echo $quantity; ?>">
        <input type="submit" class="btn btn-primary" name="add_to_cart" value="Add to Cart">
    </form>

    <!-- Rest of your HTML code -->

</body>

</html>