<?php
function connexion($user, $dbname, $host, $pass){
    try{
        $cnx = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "ERREUR : " .$e->getMessage();
    }
    return $cnx;
}

function requeteSelect($cnx,$req){
    try{
        $pdoreq = $cnx -> query($req);
        $pdoreq -> setFetchMode(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        echo "ERREUR : " .$e->getMessage();
    }
    return $pdoreq;
}