<?php
require_once "../connections/connection.php";
require_once "../authantification/userAuthantification.php";
require_once "../functions/userCrud.php";
session_start();
$connectedUser = getUserNameByID($_SESSION['auth']['id']);
$user1 = getUserByUserName($connectedUser['user_name']);
// Affichage des informations clents et admin
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        body {
            background-color: lightblue;
        }

        h2 {
            color: white;
            text-align: center;
        }

        p {
            font-family: verdana;
            font-size: 20px;
        }
    </style>
    <a href="../index.php">Acceuil</a>
    <form method="post" action="../utils/profileResult.php">
        <h2> you can modify your informations </h2>

        <label for="userName">User: </label>
        <p style="color: green"><?php echo $connectedUser['user_name']; ?></p>
        <p></p>
        <label for="user_name">UserName:</label>
        <input type="text" name="user_name" id="user_name" value="<?php echo $user1['user_name']; ?>">
        <p><?php echo isset($_SESSION['update_errors']['user_name']) ? $_SESSION['update_errors']['user_name'] : '' ?></p>

        <p></p>
        <label for="password">Password:</label>
        <input type="password" name="pwd" id="password" value="<?php echo $user1['pwd']; ?>">
        <p></p>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?php echo $user1['email']; ?>">
        <p><?php echo isset($_SESSION['update_errors']['email']) ? $_SESSION['update_errors']['email'] : '' ?></p>

        <label for="prenom">First Name:</label>
        <input type="text" name="fname" id="prenom" value="<?php echo $user1['fname']; ?>">
        <p><?php echo isset($_SESSION['update_errors']['fname']) ? $_SESSION['update_errors']['fname'] : '' ?></p>

        <label for="nom">Last Name:</label>
        <input type="text" name="lname" id="nom" value="<?php echo $user1['lname']; ?>">
        <p><?php echo isset($_SESSION['update_errors']['lname']) ? $_SESSION['update_errors']['lname'] : '' ?></p>

        <button type="submit">Edit</button>

    </form>

</body>

</html>