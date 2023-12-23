<?php
/* --Fonctions 
  --validation street length
  --validation street number length
  --validation du select et radio button
  -- validation zipcode
  */

function streetNameIsValid($street)
{
    $isValid = true;
    $result = [
        'isValid' => $isValid,
        'msg' => ""
    ];
    if (strlen($street) <= 3) {
        $isValid = false;
        $result = [
            'isValid' => $isValid,
            'msg' => "Le nom de la rue est trop courte!"
        ];
    } else if (strlen($street) >= 20) {
        $isValid = false;
        $result = [
            'isValid' => $isValid,
            'msg' => 'Le nom de la rue est trop longue!'
        ];
    }

    $resultat = $result["msg"];
    return $resultat;
}
function streetNumberIsValid($street_nb)
{
    $isValid = true;
    $result = [
        'isValid' => $isValid,
        'msg' => ""
    ];
    if (strlen($street_nb) <= 2) {
        $isValid = false;
        $result = [
            'isValid' => $isValid,
            'msg' => 'Le numéro de rue ne peut pas avoir moins de 2 chiffre!'
        ];
    } else if (strlen($street_nb) >= 11) {
        $isValid = false;
        $result = [
            'isValid' => $isValid,
            'msg' => 'Le numero de rue ne peut pas avoir plus de 10 chiffre!'
        ];
    }
    $resultat = $result["msg"];
    return $resultat;
}
function typeIsNotSelected($type)
{
    $isValid = true;
    $result = [
        'isValid' => $isValid,
        'msg' => ""
    ];

    if (empty($type)) {
        $isValid = false;
        $result = [
            'isValid' => $isValid,
            'msg' => "Veuillez choisir un type d'adresse!"
        ];
    };
    $resultat = $result["msg"];
    return $resultat;
}

function zipcodeIsValid($zipcode)
{
    $isValid = true;
    $result = [
        'isValid' => $isValid,
        'msg' => ""
    ];
    if (strlen($zipcode) <= 5) {
        $isValid = false;
        $result = [
            'isValid' => $isValid,
            'msg' => "Attention!!! Le zipcode doit être 6 caractère!"
        ];
    } elseif (strlen($zipcode) >= 7) {
        $isValid = false;
        $result = [
            'isValid' => $isValid,
            'msg' => "Attention!!! Le zipcode doit être 6 caractère!"
        ];
    }
    $resultat = $result["msg"];
    return $resultat;
}
