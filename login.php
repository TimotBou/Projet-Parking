<?php
include 'chekLogin.php';
if(isset($_POST['login']) && isset($_POST['password'])){
	$result = "";
	$login = $_POST['login'] ;
	$password = $_POST['password'];

	$sql = "SELECT * FROM connexion WHERE login = :login AND password = :password";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":login", $login, PDO::PARAM_STR);
	$stmt->bindParam(":password", $password, PDO::PARAM_STR);
	$stmt->execute();
	if ($stmt->rowCount()) {
		$result = "true";
	}
	elseif (!$stmt->rowCount()) {
		$result = "false";
	}
	echo $result;
	}
?>