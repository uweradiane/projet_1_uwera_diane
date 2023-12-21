<?php
require_once "../functions/userCrud.php";
require_once "../connections/connection.php";
require_once "../functions/validation.php";
session_start();
// Update des roles des utilisateur
if (isset($_POST)) {
    $role_id = intval($_POST['role_id']);
    $data = [
        'role_id' => $role_id,
        'user_name' => $_POST['user_name']
    ];
    $updatedUserRole = updateUserRole($data);
}
?>
<a href="./admin.php">Retour</a>