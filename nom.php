<?php
include 'chekLogin.php';
    $stmt1 = $conn->query("SELECT * FROM listeblanc")->fetchAll();
    foreach ($stmt1 as $row) {
    	$array[] = array("nom" => $row['nom'], "prenom" => $row['prenom']);
    }
    if ($stmt1 != NULL) {
		echo json_encode(
		array("Infos" => $array));
		}
		//echo json_encode(array( "nom" => array("yourJsonElement" => "Hi, I'm a string", "anotherElement" => "Ohh, why didn't you pick me")), true);
?>