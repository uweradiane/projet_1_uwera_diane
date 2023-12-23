<link rel="stylesheet" href="../styles/formConfirm.css">

<?php
require_once "../functions/addressvalidation.php";
echo "<h2>Veuillez Confirmer vos adresses</h2>";

if (isset($_POST['number'])) {
    $imax = (int)$_POST["number"];
    // Validations Des Datas dans $_POST
    $isValid = true;

    for ($i = 1; $i <= $imax; $i++) {
        if (!isset($_POST["city$i"])) {
            echo "<b/>Veuillez sélectionner une ville! <br/>";
            $isValid = false;
        }

        if (!isset($_POST["street$i"])) {
            $streetNameIsValid = streetNameIsValid($_POST["street$i"]);
            echo "$streetNameIsValid.$i <br/>";
            $isValid = false;
        }

        if (!isset($_POST["street_nb$i"])) {
            $streetNumberIsValid = streetNumberIsValid($_POST["street_nb$i"]);
            echo "$streetNumberIsValid.$i<br/>";
            $isValid = false;
        }

        if (!isset($_POST["zipcode$i"])) {
            $zipcodeIsValid = zipcodeIsValid($_POST["zipcode$i"]);
            echo "$zipcodeIsValid.$i<br/>";
            $isValid = false;
        }

        if (typeIsNotSelected($_POST["type$i"])) {
            $typeIsNotSelected = typeIsNotSelected($_POST["type$i"]);
            echo "$typeIsNotSelected.$i<br/>";
            $isValid = false;
        }
    }

    if ($isValid) {
        // Separation des valeurs pour la confirmation
?>
        <form class="formConfirm" method="post" action="./resultadress.php">
            <fieldset>
                <legend> Vos Adresses</legend>
                <input hidden name="number" value=<?php echo $imax ?>>
                <?php
                for ($i = 1; $i <= $imax; $i++) {
                    $data = [
                        "street$i" => $_POST["street$i"],
                        "street_nb$i" => $_POST["street_nb$i"],
                        "type$i"  => $_POST["type$i"],
                        "city$i" => $_POST["city$i"],
                        "zipcode$i" => $_POST["zipcode$i"]
                    ];
                    $globaldata[$i] = $data;
                ?>
                    <label for="streetName">Nom Rue</label>
                    <input type="text" id="streetName" name="street<?php echo $i ?>" value="<?php echo $data["street$i"] ?>">
                    <br />
                    <!-- ... (other fields) ... -->
                    <br />
                <?php
                }
                ?>
                <button type="submit">Confirmer</button>
            </fieldset>
        </form>
<?php
    }
} else {
    header('Location:address.php');
}
?>
<input type="button" value="Retour" onclick="history.back()" />