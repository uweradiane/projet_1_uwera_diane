<?php
//Creation De l'adresse
function createAdresse(array $data)
{
    global $conn;
    $query = "INSERT INTO address VALUES (NULL, ?, ?, ?,?,?);";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param(
            $stmt,
            "sisss",
            $data['street'],
            $data['street_nb'],
            $data['type'],
            $data['city'],
            $data['zipcode']
        );
        $result = mysqli_stmt_execute($stmt);
        echo "Adresse Ajouter!";
    }
}
// Fonctions d'Affichage 
function showData($data)
{

    echo "<table border=2>
        <thead>
        <tr>
        <th>Category</th>
        <th>Information</th>
        </tr>
        </thead>
        <tbody>";
    foreach ($data as $key => $value) {
        echo " 
        <tr>
       <td> {$key}</td>
       <td> {$value}</td>
       </tr>
       ";
    }
    echo "
        </tbody>
        </table><br/>";
}
