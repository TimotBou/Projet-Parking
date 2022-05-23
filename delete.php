<?php
include 'chekLogin.php';
if (isset($_POST['nom']) && isset($_POST['prenom'])) {
    $result = "";
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
    $stmt1 = $conn->query("SELECT * FROM listeblanc where nom = '$nom' and prenom = '$prenom'")->fetchAll();
	foreach ($stmt1 as $row) {
             $idimm = $row['idImma'];
    }
    $sql = "DELETE FROM listeblanc WHERE nom = '$nom' and prenom = '$prenom'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	/*$sql1 = "DELETE FROM capteur WHERE idImma = '$idimm'";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute();
    $stmt1->closeCursor();*/
    if ($stmt->rowCount()) {
		$result="true";
	}
	elseif (!$stmt->rowCount()) {
		$result = "false";
	}
	echo "$result";
}
?>