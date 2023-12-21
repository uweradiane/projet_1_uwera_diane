<?php
function addProduct(array $data)
{

    global $conn;
    $query = "INSERT INTO product (id, name, quantity, price, img_url, description) VALUES (NULL, ?, ?, ?,?,?)";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "sidss",
            $data['name'],
            $data['quantity'],
            $data['price'],
            $data['img_url'],
            $data['description']
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}

function getAllProducts()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM product");

    $productData = [];
    $i = 0;
    while ($rangeeData = mysqli_fetch_assoc($result)) {
        $productData[$i] = $rangeeData;
        $i++;
    };
    return $productData;
}
