<?php

function createUser(array $data)
{
    global $conn;

    $query = "INSERT INTO user VALUES (NULL, ?, ?, ?,?,?,?,?,?,?)";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "sssssiisi",
            $data['user_name'],
            $data['email'],
            $data['pwd'],
            $data['fname'],
            $data['lname'],
            $data['billing_address_id'],
            $data['shipping_address_id'],
            $data['token'],
            $data['role_id'],
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}

function getUserByUserName($user_name)
{

    global $conn;

    $query = "SELECT * FROM user WHERE user.user_name = '" . $user_name . "';";

    $result = mysqli_query($conn, $query);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_assoc($result);
    return $data;
}

function getUserNameByID($id)
{

    global $conn;

    $query = "SELECT user_name FROM user WHERE user.id = '" . $id . "';";

    $result = mysqli_query($conn, $query);

    // avec fetch row : tableau indexé
    $name = mysqli_fetch_assoc($result);
    return $name;
}

function getAllUsers()
{

    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user");

    $data = [];
    $i = 0;
    while ($rangeeData = mysqli_fetch_assoc($result)) {
        $data[$i] = $rangeeData;
        $i++;
    };
    return $data;
}

function updateUser(array $data)
{
    global $conn;

    $query = "UPDATE user SET user_name = ?, email = ?, pwd = ?, fname = ?, lname = ?, billing_address_id=?,
            shipping_address_id = ?, role_id = ?
            WHERE user.id = ?";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "sssssiiii",

            $data['user_name'],
            $data['email'],
            $data['pwd'],
            $data['fname'],
            $data['lname'],
            $data['billing_address_id'],
            $data['shipping_address_id'],
            $data['role_id'],
            $data['id'],
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}

function updateToken($data)
{

    global $conn;
    $query = "UPDATE user SET  token= ? WHERE user.id = ?";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "si",
            $data['token'],
            $data['id'],
        );

        $result = mysqli_stmt_execute($stmt);
    }
}

function updateUserRole($data)
{
    global $conn;
    $query = "UPDATE user SET  role_id= ? WHERE user.user_name = ?";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "is",
            $data['role_id'],
            $data['user_name'],
        );

        $result = mysqli_stmt_execute($stmt);
        echo "<p></>";
        echo "<h3>User modified</h3>";
    }
}
