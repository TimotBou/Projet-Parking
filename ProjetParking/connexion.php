<?php
$html=<<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>Acceuil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="Site.css">
</head>
<body>
    <form action="liaison.php" method="post">
        <fieldset>
            <legend><h1 id="Log"></h1></legend>
            <p id="Log">Connexion</p>
            <table>
                <tr>
                    <td>
                        <label for="login">Identifiant : </label>
                        <br/>
                        <input id="champlogin" type="text" name="login" maxlenght="256" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass">Mot de passe : </label>
                        <br/>
                        <input id="champpass" type="password" name="password" maxlenght="256" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input id="champconn" type="submit" name="envoyer" value="Connexion">
                        <input id="champres" type="reset" name="effacer" value="Reinitialiser">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>
HTML;
echo "$html";
?>