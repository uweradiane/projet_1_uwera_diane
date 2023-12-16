<?php
require_once "../connections/connection.php";
require_once "../athantification/userAuthantication.php";
require_once "../functions/userCrud.php";
session_start();
$users = getAllUsers();
$connectedUser = getUserNameByID($_SESSION['auth']['id']);
$user1 = getUserByUserName($connectedUser['user_name']);

?>
<a href="../../index.php">Acceuil</a>
<form name="form1" method="post" action="./editSuperAdmin.php">
    <fieldset>
        <legend>Profils</legend>
        <label for="userName">UserName: </label>
        <?php echo $connectedUser['user_name']; ?>
        <p></p>
        <label for="password">Password:</label>
        <input type="password" name="pwd" id="password" value="<?php echo $user1['pwd']; ?>">
        <p></p>
        <label for="couriel">Email:</label>
        <input type="text" name="email" id="couriel" value="<?php echo $user1['email']; ?>">
        <p class="text-danger"><?php echo isset($_SESSION['update_errors']['email']) ? $_SESSION['update_errors']['email'] : '' ?></p>

        <label for="prenom">Fist Name:</label>
        <input type="text" name="fname" id="prenom" value="<?php echo $user1['fname']; ?>">
        <p class="text-danger"><?php echo isset($_SESSION['update_errors']['fname']) ? $_SESSION['update_errors']['fname'] : '' ?></p>

        <label for="nom">Last Name:</label>
        <input type="text" name="lname" id="nom" value="<?php echo $user1['lname']; ?>">
        <p class="text-danger"><?php echo isset($_SESSION['update_errors']['lname']) ? $_SESSION['update_errors']['lname'] : '' ?></p>

        <button type="submit">Edit</button>
    </fieldset>
</form>
<form name="form2" method="post" action="./updateUserole.php">
    <fieldset>
        <legende>Edit the Role of user</legende>
        Users:
        <select name="user_name">
            <option> </option>
            <?php foreach ($users as $name => $user) {
            ?> <option><?php
                        echo $user['user_name']; ?>
                </option><?php
                        } ?>
        </select>
        New Role:
        <input type="radio" name="role_id" id="new_role" value="1">Admin
        <input type="radio" name="role_id" id="new_role" value="2">superAdmin
        <input type="radio" name="role_id" id="new_role" value="3">Client
        <br>
        <br>
        <button type="submit">Edit</button>


    </fieldset>
</form>