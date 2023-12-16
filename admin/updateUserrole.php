<?php
require_once "../functions/userCrud.php";
require_once "../connections/connection.php";
require_once "../functions/validations.php";
session_start();
if (isset($_POST)) {
    $role_id = intval($_POST['role_id']);
    $data = [
        'role_id' => $role_id,
        'user_name' => $_POST['user_name']
    ];
    $updatedUserRole = updateUserRole($data);
}
?>
<a href="./superAdminiprofile.php">Retour</a>