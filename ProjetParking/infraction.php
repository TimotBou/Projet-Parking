<?php
session_start();
include("modele.php");
header ('Content-Type: text/html; charset=windows-1252');
$host = "localhost:3306";
$bdname = "parking";
$user = "TimTim";
$password = "1234";
$connect = connexion($user, $bdname, $host, $password);
$req = "SELECT login, password FROM utilisateur";
$pdoreq = requeteSelect($connect, $req);
$reqjour = "SELECT idImma, TimeSpamp FROM captureimmatriculation";
$pdoreqjour = requeteSelect($connect, $reqjour);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Liste des infractions</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="infra.css">
</head>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Choisir un jour pour les infractions</legend>
            <h2>
            <select id="day" name="jour">
                <?php foreach ($pdoreqjour as $value){?>
                    <option value="<?php
                        echo $value['TimeSpamp'];
                        ?>"
                        >
                        <?php
                        echo $value['TimeSpamp'];
                        echo"";
                        ?>
                </option>
                <?php } ?>
                 </select>
                 <input id="valid" onclick="jourid" type="submit" value="valider" /></h2>
                 </fieldset>
                </form>
                <h1>
                <?php
                $j = $_POST['jour'];
                $reqimg = "SELECT lien, idImma FROM captureimmatriculation WHERE TimeSpamp = '$j'";
                $pdoreqimg = requeteSelect($connect, $reqimg);
                foreach($pdoreqimg as $value){
              
                   echo "Immatriculation :";
                   echo $value['idImma'];
                    ?>
                    </h1>
                    <img id="imginfra" src= "<?php echo $value['lien']; ?>"/> <?php
                }
                 ?> 
</body>
</html>