<?php
$user_name = '';
if (isset($_SESSION['login_form']['user_name'])) {
    $user_name = $_SESSION['login_form']['user_name'];
}

$pwd = '';
if (isset($_SESSION['login_form']['pwd'])) {
    $pwd = $_SESSION['login_form']['pwd'];
}
?>
<!-- Chaque formulaire a sa page de résultats -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<form method="post" action="../results/loginResult.php">
    <div>
        <label for="user_name">UserName</label>
        <input id="user_name" type="text" name="user_name" value="<?php echo $user_name ?>">
        <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['login_errors']['user_name']) ? $_SESSION['login_errors']['user_name'] : '' ?></p>
    </div>
    <div>
        <label for="pwd">Mot de passe</label>
        <input id="pwd" type="text" name="pwd" value="<?php echo $pwd ?>">
        <p style="color: red; font-size: 0.8rem;"><?php echo isset($_SESSION['signup_errors']['pwd']) ? $_SESSION['signup_errors']['pwd'] : '' ?></p>

    </div>
    <li class="nav-item"><a class="nav-link" href="signup.php">S'enregistrer</a></li>
    <button type="submit">Login</button>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>