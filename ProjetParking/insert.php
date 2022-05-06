<?php
include 'chekLogin.php';
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel']) && isset($_POST['immatriculation']) && isset($_POST['mail']) ){
	$result = "";
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['mail'];
	$tel = $_POST['tel'];
	$immatriculation = $_POST['immatriculation'];
	$sql1 = "INSERT INTO capteur (idImma, alerter, Immatriculation) VALUES (NULL, NULL, '$immatriculation')";
	$stmt1 = $conn->prepare($sql1);
	$stmt1->execute();
	$stmt1->closeCursor();
	$data = $conn->query("SELECT * FROM capteur where Immatriculation = '$immatriculation' ")->fetchAll();
    foreach ($data as $row) {
             $idimma = $row['idImma'];
    }
    $sql = "INSERT INTO listeblanc (id, nom, prenom, tel, mail, idImma) VALUES (NULL, '$nom', '$prenom', '$tel', '$mail', '$idimma')";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	if ($stmt->rowCount()) {
		$result="true";
	}
	elseif (!$stmt->rowCount()) {
		$result = "false";
	}
	echo "$result";
}
?>