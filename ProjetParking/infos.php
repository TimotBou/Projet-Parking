<?php
include 'chekLogin.php';
if (isset($_POST['nom']) && isset($_POST['prenom'])) {
	
    $result = "";
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
    $stmt1 = $conn->query("SELECT * FROM listeblanc where nom = '$nom' and prenom = '$prenom'")->fetchAll();
    foreach ($stmt1 as $row) {
    	     $idImma = $row['idImma'];
             $nom1 = $row['nom'];
             $prenom1 = $row['prenom'];
             $tel = $row['tel'];
             $mail = $row['mail']; 
    }
    $stmt2 = $conn->query("SELECT * FROM capteur where idImma = '$idImma'")->fetchAll();
    foreach ($stmt2 as $key) {
    	$immatriculation = $key['Immatriculation'];
    }
	if ($stmt1 != NULL) {
		echo json_encode(array("nom" => $nom1,
		                       "prenom" => $prenom1,
		                       "tel" => $tel,
		                       "mail" => $mail,
		                       "immatriculation" => $immatriculation));
	}
	else{
		echo json_encode(array("status" => "error", "message" => "User not found"));
	}
	exit();
}
?>