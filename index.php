<?php

require_once("modelo/settings.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NAME_APP ?> | Log In</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="contenedor">
    <form action="" method="post" class="contenedor-abuelo">
        <div class="contenedor-titulo">
            <h1><?php echo NAME_APP ?></h1>
        </div>
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
            <button type="submit" class="btn">Log In</button>
            <a href="signup.php" class="btn">Sign Up</a>
        </div>
    </form>
</body>
</html>