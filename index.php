<?php

require_once("modelo/settings.php");

?>
<!DOCTYPE html>
<html lang="e">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NAME_APP ?> | Log In</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="contenedor">
    <form action="controlador/userController.php" method="post" class="contenedor-abuelo">
        <div class="contenedor-titulo">
            <h1><?php echo NAME_APP ?></h1>
        </div>
        <?php
        if(isset($_GET["error"])){
        ?>
        <div class="contenedor-error">
            <p><span>Error:</span> <?php echo $_GET["error"]=="1"?"Credenciales incorrectas.":"Algo salio mal."; ?></p>
        </div>
        <?php
        }
        ?>
        <div class="contenedor-input">
            <div>
                <label for="txtUsername">Nombre de usuario:</label>
            </div>
            <input type="text" name="txtUsername" id="txtUsername" placeholder="Nombre de usuario" autofocus required>
        </div>
        <div class="contenedor-input">
            <div>
                <label for="txtPassword">Contraseña:</label>
            </div>
            <input type="password" name="txtPassword" id="txtPassword" placeholder="Contraseña" required>
        </div>
        <div class="contenedor-btn">
            <button type="submit" name="btnOperacion" value="login" class="btn">Log In</button>
            <a href="signup.php" class="btn">Sign Up</a>
        </div>
    </form>
</body>
</html>