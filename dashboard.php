<?php

require_once("modelo/settings.php");
require_once("controlador/user.class.php");
require_once("modelo/query.php");
require_once("controlador/event.class.php"); 

session_start();
if(isset($_SESSION["user_activo"])){
    $user = new User("", "", "", "", $_SESSION["user_activo"]);
    $user->fill();
}else{
    header("Location: index.php");
}
date_default_timezone_set('America/El_Salvador');
setlocale(LC_ALL,"es_ES");
//obtener todos los datos
$eventos = new Event(); 
$eventos->setIdUsuario($_SESSION["user_activo"]); 
$events = $eventos->getEventsByUserID(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title><?php echo NAME_APP ?></title>
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
                <a href="newEvento.php">Crear nuevo evento</a>
                </div>
            </div>
        </div>
      
        <div id="agenda">
            <div class="base-grid">
                <div class="last-event">
                    <div class="today">
                        <h2><?=date("l jS \of F Y h:i:s A")?></h2>
                    </div>
                    <div class="events">
                    <?php
                        $c = 0; 
                        foreach($events as $event){
                            $eventDates = explode("-" , $event['StartDate']); 
                            if(date('Y') == $eventDates[0]){
                                if(date('m') == $eventDates[1]){
                                    if(date('d') == $eventDates[2]){
                                        $eventHTML = <<<EOD
                                            <div class="event">
                                                <div class="fecha">
                                                    {$event['StartDate']}
                                                </div>
                                                <div class="datos">
                                                    <h3>{$event['name']}</h3>
                                                    <div class="ev-btns">
                                                        <a href='editar.php?id={$event['idEvent']}' class="btn">
                                                            Ver o editar
                                                        </a>
                                                        <div class="btn del-btn" id='eliminar_{$event['idEvent']}' >
                                                            Eliminar
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        EOD; 
                                        echo $eventHTML;
                                        $c++;
                                    }else{
                                         
                                    }
                                }
                            }
                        }
                        if($c ==0 ){
                            echo "No hay eventos recientes"; 
                        }
                    ?>
                    </div>
                </div>
                <div class="upnext-events">
                    <div class="events">
                        <?php
                            foreach($events as $event){
                            
                                $eventHTML = <<<EOD
                                <div class="event">
                                    <div class="fecha">
                                        {$event['StartDate']}
                                    </div>
                                    <div class="datos">
                                        <h3>{$event['name']}</h3>
                                        <div class="ev-btns">
                                            <a class="btn" href='editar.php?id={$event['idEvent']}'>
                                                Ver o editar
                                            </a>
                                            <div class="btn del-btn" id='eliminar_{$event['idEvent']}'>
                                                Eliminar
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                EOD; 
                                if($c==0){
                                    echo $eventHTML;
                                }else{
                                    $c--; 
                                }
                            }
                            
                        
                        

                        ?>


                    </div>
               
                </div>
            </div>
        </div>
    
    </header>
    <script src="js/dashboard.js"></script>
</body>
</html>