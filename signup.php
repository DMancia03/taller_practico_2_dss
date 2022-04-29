<?php

require_once("modelo/settings.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NAME_APP ?> | Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="contenedor">
    <form action="controlador/userController.php" method="post" class="contenedor-abuelo">
        <div class="contenedor-titulo">
            <h1><?php echo NAME_APP ?> | Sign Up</h1>
        </div>
        <?php
        if(isset($_GET["error"])){
        ?>
        <div>
            <p>Error: Algo salio mal.</p>
        </div>
        <?php
        }
        ?>
        <div class="contenedor-row-2">
            <div class="contenedor-input">
                <div>
                    <label for="txtName">Nombres:</label>
                </div>
                <input type="text" name="txtName" id="txtName" placeholder="Nombres" autofocus required>
            </div>
            <div class="contenedor-input">
                <div>
                    <label for="txtLastname">Apellidos:</label>
                </div>
                <input type="text" name="txtLastname" id="txtLastname" placeholder="Apellidos" required>
            </div>
        </div>
        <div class="contenedor-row-2">
            <div class="contenedor-input">
                <div>
                    <label for="txtUsername">Nombre de usuario:</label>
                </div>
                <input type="text" name="txtUsername" id="txtUsername" placeholder="Nombre de usuario" required>
            </div>
            <div class="contenedor-input">
                <div>
                    <label for="txtPassword">Contraseña:</label>
                </div>
                <input type="password" name="txtPassword" id="txtPassword" placeholder="Contraseña" required>
            </div>
        </div>
        <div class="contenedor-btn">
            <button type="submit" name="btnOperacion" value="signup" class="btn">Sign Up</button>
            <a href="index.php" class="btn">Regresar</a>
        </div>
    </form>
</body>
</html>