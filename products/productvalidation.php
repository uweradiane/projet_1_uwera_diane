<?php

function ProductNameIsValid($name)
{
    $result = [
        "isValid" => true,
        "msg" => ''
    ];
    $productExists = getAllProducts($name);
    if (strlen($name) <= 2) {
        $result = [
            "isValid" => false,
            "msg" => "Le nom du produit est trop court"
        ];
    } elseif (strlen($name) >= 20) {
        $result = [
            "isValid" => false,
            "msg" => "Le nom du produit est trop long"
        ];
    } elseif ($name == $productExists) {
        $result = [
            "isValid" => false,
            "msg" => "Le nom du produit n'est pas valide"
        ];
    }
    return $result;
}

function productQuantity($quantity)
{
    $result = [
        "isValid" => true,
        "msg" => ''
    ];
    if (!is_numeric($quantity)) {
        $result = [
            "isValid" => false,
            "msg" => "This field is numeric"
        ];
    }
    return $result;
}

function productPrice($price)
{
    $result = [
        "isValid" => true,
        "msg" => ''
    ];
    if (!is_numeric($price)) {
        $result = [
            "isValid" => false,
            "msg" => "Invalid price Format"
        ];
    }
    return $result;
}
