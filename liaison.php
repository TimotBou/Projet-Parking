<?php
if (isset($_POST)){
    $login = $_POST['login'];
    $pass = $_POST['password'];
}

session_start();
$login = $_POST['login'];
$pass = $_POST['password'];

include("modele.php");
$host = "192.168.10.20";
$bdname = "parking";
$user = "admin";
$password = "admin";
$connect = connexion($user, $bdname, $host, $password);
$req = "SELECT login, password FROM utilisateur";
$pdoreq = requeteSelect($connect, $req);

foreach ($pdoreq as $ligne){
    $utili = $ligne['login'];
    $mot = $ligne['password'];
    $utilia = $ligne['IsPolice'];
    
    if ($login == $utili && $pass == $mot){
        header('location: infraction.php');
        exit;
        
    }

    else {
        header('location: 404.html');
    }
}