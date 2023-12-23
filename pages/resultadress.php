<link rel="stylesheet" href="../styles/formConfirm.css">

<?php
session_start();
require_once '../connections/connection.php';
require_once '../functions/addressfunction.php';

$allAddress = []; // Initialize $allAddress array

if (isset($_POST["number"])) {
    $imax = $_POST["number"];
    for ($i = 1; $i <= $imax; $i++) {
        $dataAdress = [
            'street' => $_POST['street' . $i],
            'street_nb' => (int)$_POST['street_nb' . $i],
            'type' => $_POST['type' . $i],
            'city' => $_POST['city' . $i],
            'zipcode' => $_POST['zipcode' . $i]
        ];
        $allAddress[$i] = $dataAdress;
    }
    $_SESSION['data'] = $allAddress;
}

if (isset($_SESSION['data'])) {
    $globaldata = $_SESSION['data'];

    // Check if $globaldata is an array before using it in foreach
    if (is_array($globaldata)) {
        foreach ($globaldata as $data) {
            showData($data);
            createAdresse($data);
        }
    } else {
        // Handle the case where $globaldata is not an array
        echo "No address data found.";
    }
}

?>

<a href="confirmadress.php">add Adress</a>