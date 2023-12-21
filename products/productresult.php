<?php
require_once "./productCrud.php";
require_once "../config/connexion.php";
require_once "./productsValidation.php";
session_start();

if (isset($_POST)) {

    unset($_SESSION['errors']);
    $validation = true;

    if (!empty($_POST['name'])) {
        $productNameisValid = ProductNameIsValid($_POST['name']);
        if ($productNameisValid["isValid"] == false) {
            $validation = false;
        }
    }
    if (!empty($_POST['quantity'])) {
        $quantityFormatIsValid = productQuantity($_POST['quantity']);
        if ($quantityFormatIsValid['isValid'] == false) {
            $validation = false;
        }
    }
    if (!empty($_POST['price'])) {
        $priceFormatIsValid = productPrice($_POST['price']);
        if ($priceFormatIsValid['isValid'] == false) {
            $validation = false;
        }
    }
    if (empty($_POST['img_url'])) {
        $urlVide = true;
        $validation = false;
    }
    if (empty($_POST['description'])) {
        $descVide = true;
        $validation = false;
    }

    if ($validation == true) {
        $data = [
            'name' => $_POST['name'],
            'quantity' => intval($_POST['quantity']),
            'price' => doubleval($_POST['price']),
            'img_url' => $_POST['img_url'],
            'description' => $_POST['description']
        ];
        var_dump($data);
        $newProduct = addProduct($data);
    } else {
        $_SESSION['errors'] = [
            'name' => $productNameisValid['msg'],
            'quantity' => $quantityFormatIsValid['msg'],
            'price' => $priceFormatIsValid['msg'],
            'img_url' => $urlVide,
            'decription' => $descVide
        ];
        $url = "./addproduct.php";
        header('Location:  ' . $url);
    }
} else {
    $url = "./addproduct.php";
    header('Location: ' . $url);
}
?>
<a href="./addProduct.php">Retour</a>