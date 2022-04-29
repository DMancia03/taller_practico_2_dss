<?php

require_once("modelo/settings.php");
require_once("controlador/user.class.php");
require_once("modelo/query.php");

session_start();
if(isset($_SESSION["user_activo"])){
    $user = new User("", "", "", "", $_SESSION["user_activo"]);
    $user->fill();
}else{
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NAME_APP ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div>
            <h1><?php echo NAME_APP ?></h1>
        </div>
        <div>
            <p>Bienvenido/a <?php echo $user->getName(); ?></p>
        </div>
        <div>
            <a href="controlador/userController.php?operacion=logout">Logout</a>
        </div>
    </header>
</body>
</html>