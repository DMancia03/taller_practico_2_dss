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
    <title>Crear nuevo evento</title>
    <link rel="stylesheet" href="css/dashboard.css">

</head>
<body>
    <header>
        <div class="appName">
            <h1><?php echo NAME_APP ?></h1>        
        </div>
       
        <div class="user-data">
            <div class="user">
                <div>
                    <h3>Bienvenido/a  <?php echo $user->getName(); ?></h3>

                </div>
            </div>
            <div class="buttons">
                <div class="btn">
                <a href="controlador/userController.php?operacion=logout">Logout</a>
                </div>
                <div class="btn">
                <a href="dashboard.php">Volver al inicio</a>
                </div>
            </div>
        </div>
      
        <div id="agenda">
            <div class="base-grid">
                <div class="header-form">
                    <h2>CREACIÓN DE NUEVO EVENTO</h2>

                </div>
                <div class="form">
                    <form action="controlador/eventController.php?option=save" method="post">
                        <input type="hidden" name="user" value="<?="3"?>">    
                    <div class="inputs">
                            <label for="name">Nombre de evento</label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="inputs">
                            <label for="desc">Descripcion de evento</label>
                            <textarea id="desc" name="desc"></textarea>
                        </div>
                        <div class="inputs">
                            <label for="date">Fecha de evento</label>
                            <input type="date" name="date" id='date'>
                        </div>
                        <div class="inputs">
                            <input type="submit" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
</body>
</html>