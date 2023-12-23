<?php
require_once("../connections/connection.php");
require_once "../functions/addressfunction.php";
require_once "../functions/addressvalidation.php";

$name = '';
session_start();

// prendre l'id de l'utilisateur authentifié et aller chercher ses informations dans la DB
// une fois l'utilisateur récupéré mettre son nom dans $name = $user["user_name"]

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Add Item</title>
</head>

<body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: beige;
        }

        .signup-table {
            margin-top: 50px;
            width: 100%;
        }

        .address-form {
            background-color: GREEN;
            padding: 20px;
            border-radius: 5px;
        }

        .form-title {
            text-align: center;
        }
    </style>
    <div class="container">

        <p>Bonjour <?php echo $name ?></p>
        <h2>Add Address</h2>

        <form action="../utils/logout.php" method="post">
            <label for="street_name">street_name:</label>
            <input type="text" id="street_name" name="street_name" required /><br>
            <label for="street_nb">street_nb:</label>
            <textarea id="text" name="street_nb"></textarea><br>
            <label for="city">city:</label>
            <input type="text" id="city" name="city" required /><br>
            <label for="province">province:</label>
            <select name="province">
                <b>
                    <option value="Alberta">-----Select-----</option><b>
                        <option value="Alberta">Alberta</option>
                        <option value="British Columbia">British Columbia</option>
                        <option value="Manitoba">Manitoba</option>
                        <option value="New Brunswick">New Brunswick</option>
                        <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                        <option value="Nova Scotia">Nova Scotia</option>
                        <option value="Ontario">Ontario</option>
                        <option value="Prince Edward Island">Prince Edward Island</option>
                        <option value="Quebec">Quebec</option>
                        <option value="Saskatchewan">Saskatchewan</option>
            </select><br>
            <label for="zip_code">zip_code:</label>
            <input type="text" id="zip_code" name="zip_code" required /><br>
            <label for="country">country:</label>
            <input type="text" id="country" name="country" required /><br>
            <button type="submit">Save</button>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </form>


    </div>
</body>

</html>