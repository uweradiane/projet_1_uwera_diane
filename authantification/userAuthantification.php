<?php
//to do Authentification
function authenticated(array $data)
{
    if ($data) {
        echo "User Connected";
    } else {
        echo "";
    }
}

function userIsAdmin($data)
{
    if (intval($data) === 1) {
        $url = "./admin/superAdminiprofile.php";
    } elseif (intval($data) == 2 || intval($data) == 3) {
        $url = "./pages/profile.php";
    } else {
        $url = "./pages/login.php";
    }
    return $url;
}
