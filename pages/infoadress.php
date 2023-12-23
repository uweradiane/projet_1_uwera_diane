<link rel="stylesheet" href="../styles/formInfo.css">
<a href="../client.php">
    <h2>Accueil</h2>
</a>
<?php

if (isset($_POST["name"], $_POST["number"])) {
    $nom = $_POST["name"];
    $imax = (int)$_POST["number"];

?>
    <form class="forminfo" method="post" action="confirmadress.php">
        <h1>Enregistrement</h1>
        <input hidden name="number" value=<?php echo $imax ?>>
        <?php
        for ($i = 1; $i <= $imax; $i++) {
        ?>
            <h3>Adresse <?php echo $i; ?></h3>
            <label for="streetNo">Numero Rue <input type="number" id="streetNo" name="street_nb<?php echo $i ?>" value=""></label>
            <br />
            <label for="streetName">Nom Rue<input type="text" id="streetName" name="street<?php echo $i ?>" value=""></label>
            <br />
            <label for="adcity">Type D'adresse</label>
            <br />
            <select id="adcity" name="type<?php echo $i ?>">
                <option value=""></option>
                <option value="Domicile">Domicile</option>
                <option value="Livraison">Livraison</option>
                <option value="Facturation">Facturation</option>
                <option value="Professionelle">Professionelle</option>
            </select>
            <br />
            <br />
            <input type="radio" id="adcity1" name="city<?php echo $i ?>" value="Montréal">Montréal
            <input type="radio" id="adcity2" name="city<?php echo $i ?>" value="Laval">Laval
            <input type="radio" id="adcity3" name="city<?php echo $i ?>" value="Lassalle">Lassalle
            <input type="radio" id="adcity4" name="city<?php echo $i ?>" value="Lachine">Lachine
            <input type="radio" id="adcity5" name="city<?php echo $i ?>" value="Sheerbrooke">Sheerbrooke
            <input type="radio" id="adcity6" name="city<?php echo $i ?>" value="Québec">Québec
            <br />
            <label for="code">Code Postal<input type="text" id="code" name="zipcode<?php echo $i ?>" value=""></label>
            <br />
            <br />

        <?php
        }
        ?>
        <button type="submit">Enregistrer</button>
    </form>
<?php
} else {

    exit;
}
?>
<input type="button" value="Retour" onclick="history.back()" />