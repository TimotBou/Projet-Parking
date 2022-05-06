<?php
if (isset($_POST)){
    $login = $_POST['login'];
    $pass = $_POST['password'];
}

session_start();
$login = $_POST['login'];
$pass = $_POST['password'];

include("modele.php");
$host = "localhost:3306";
$bdname = "parking";
$user = "root";
$password = "";
$connect = connexion($user, $bdname, $host, $password);
$req = "SELECT login, password, IsPolice FROM utilisateur";
$pdoreq = requeteSelect($connect, $req);

foreach ($pdoreq as $ligne){
    $utili = $ligne['login'];
    $mot = $ligne['password'];
    $utilia = $ligne['IsPolice'];
    
    if ($login == $utili && $pass == $mot){
        if ($utilia == 1){
        header('location: infraction.php');
        exit;
        }
    }

    else {
        header('location: 404.html');
    }
}