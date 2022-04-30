<?php
require_once("modelo/settings.php");
require_once("controlador/user.class.php");
require_once("modelo/query.php");
require_once("controlador/event.class.php"); 

session_start();
if(isset($_SESSION["user_activo"]) && isset($_GET['id'])){
    $user = new User("", "", "", "", $_SESSION["user_activo"]);
    $user->fill();
}else{
    header("Location: index.php");
}
$event = new Event(); 
$event->setIdEvento($_GET['id']); 
$data = $event->getAnEvent();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nuevo evento</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
                    <h2>INFORMACIÓN Y EDICION DE EVENTO</h2>

                </div>
                <div class="form">
                    <div class="buttons-2">
                        <div class="btn" id='edit_btn' >
                            <p>Editar este Evento</p>
                         </div>
                         <div class="btn hidden" id='cancel_btn' >
                            <p>Cancelar</p>
                         </div>
                    </div>
                    <form action="controlador/eventController.php?option=update" method="post">
                        <input type="hidden" name="event" id='event' value="<?=$event->getIdEvento()?>">
                        <input type="hidden" name="user" id='user'value="<?=$user->getID()?>">    
                        <div class="inputs">
                            <label for="name">Nombre de evento</label>
                            <input type="text" name="name" id="name" value="<?=$data['name']?>" disabled>
                        </div>
                        <div class="inputs">
                            <label for="desc">Descripcion de evento</label>
                            <textarea id="desc" name="desc" disabled><?=$data['Description']?></textarea>
                        </div>
                        <div class="inputs">
                            <label for="date">Fecha de evento</label>
                            <input type="date" name="date" id='date' value="<?=$data['StartDate']?>" disabled>
                        </div>
                        <div class="inputs">
                            <input type="submit" value="Guardar" class='hidden' id='sbmt'>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <script src='js/edit.js'></script>
</body>
</html>