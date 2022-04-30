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
$dayW = date('N');
$day = date('d'); 
$month = date('m'); 
$year = date('Y');
$date = $year . '-'.$month . "-" . $day; 

switch($dayW){
    case 1:
        $dayW = "Lunes"; 
    break;
    case 2: 
        $dayW = "Martes"; 
    break;
    case 3:
        $dayW = "Miercoles"; 
        break; 
    case 4: 
        $dayW = "Jueves"; 
        break;
    case 5: 
        $dayW = "Viernes"; 
        break;
    case 6: 
        $dayW = "Sabado"; 
        break;
    case 7:
        $dayW = "Domingo"; 
        break;
}
switch($month){
    case 1:
        $month = "Enero"; 
    break;
    case 2: 
        $month = "Febrero"; 
    break;
    case 3:
        $month = "Marzo"; 
        break; 
    case 4: 
        $month = "Abril"; 
        break;
    case 5: 
        $month= "Mayo"; 
        break;
    case 6: 
        $month = "Junio"; 
        break;
    case 7:
        $month = "Julio"; 
        break;
    case 8:
        $month = "Agosto"; 
        break;
    case 9: 
            $month = "Septiembre"; 
        break;
        case 10:
            $month = "Octubre"; 
            break; 
        case 11: 
            $month = "Noviembre"; 
            break;
        case 12: 
            $month = "Diciembre"; 
            break;
}
//obtener todos los datos
$eventos = new Event(); 
$eventos->setIdUsuario($_SESSION["user_activo"]); 
$events = $eventos->getEventsByUserID(); 
?>
<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard_2.css">
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
    </header>
    <div id="agenda">
            <div class="base-grid">
                <div class="last-event">
                    <div class="today">
                        <h2>Hoy es <?=$dayW . " " . $day . " de " .$month. " del " . $year?></h2>
                        <h3 id='reloj'>
                            00:00:00
                        </h3>
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
                                                    <div class='title'>
                                                        <h3>{$event['name']}</h3>
                                                    </div>
                                                    <div class='desc'> 
                                                        {$event['Description']}
                                                    </div>
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
                    <div class="custom-shape-divider-bottom-1651300134">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                    </svg>
                </div>
                <!----
                <div class="custom-shape-divider-bottom-1651300364">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M598.97 114.72L0 0 0 120 1200 120 1200 0 598.97 114.72z" class="shape-fill"></path>
                    </svg>
                </div>-->
                <div class="normal-div2">

                </div>
                </div>
                <div class="upnext-events">
                    <div class="events">
                        <div class='title-ev'>
                            <h3>Todos los eventos</h3>
                        </div>
                        <?php
                            foreach($events as $event){
                                if($date!=$event['StartDate']){
                                    $date=$event['StartDate'];
                                    echo "<div class='newDate'>{$date}</div>";
                                }
                                $eventHTML = <<<EOD
                                <div class="event">
                                    <div class="fecha">
                                        {$event['StartDate']}
                                    </div>
                                    <div class="datos">
                                        <div class='title'>
                                            <h3>{$event['name']}</h3>
                                        </div>
                                        <div class='desc'> 
                                            {$event['Description']}
                                        </div>
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
                                #if($c==0){
                                    echo $eventHTML;
                                #}else{
                                #    $c--; 
                               # }
                            }
                            
                        
                        

                        ?>


                    </div>
               
                </div>
            </div>
        </div>
    <script src="js/dashboard.js"></script>
    <script src="js/reloj.js"></script>

</body>
</html>