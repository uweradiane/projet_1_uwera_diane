<?php

/**
 * Create user 
 * 
 */
function createUser(array $data)
{
    global $conn;

    $query = "INSERT INTO user VALUES(NULL,?,?,?,?,?,?,?,?,?)";
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
            $data['role_id']

        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}
/**
 * Get all users
 */
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
/**
 * Get user by id
 */

//Todo: edit to prepare
function getUserById(int $id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id = " . $id);

    $data = mysqli_fetch_assoc($result);

    return $data;
}

function getUserByUsername(string $user_name)
{
    global $conn;

    $query = "SELECT * FROM user WHERE user.user_name = '" . $user_name . "';";

    $result = mysqli_query($conn, $query);

    // avec fetch row : tableau indexé
    $data = mysqli_fetch_assoc($result);
    return $data;
}

/**
 * Update user
 */
function updateUser(array $data)
{
    global $conn;

    $query = "UPDATE user SET user_name = ?, email = ?, pwd = ?, fname = ?, lname = ?, billing_address_id = ?, shipping_address_id = ?, role_id = ?
            WHERE user.id = ?;";

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
            $data['role_id'],
            $data['id']
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}

function updatetoken($data)
{
    global $conn;
    $querry = "UPDATE user Set token= ? where user.id =?";
    if ($stmt = mysqli_prepare($conn, $querry)) {
        mysqli_stmt_bind_param(
            $stmt,
            "si",
            $data['token'],
            $data['id'],
        );
        $result = mysqli_stmt_execute($stmt);
    }
}
/**
 * Delete user
 */
function deleteUser(int $id)
{
    global $conn;

    $query = "DELETE FROM user
                WHERE user.id = ?;";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param(
            $stmt,
            "i",
            $id,
        );

        /* Exécution de la requête */
        $result = mysqli_stmt_execute($stmt);
    }
}
