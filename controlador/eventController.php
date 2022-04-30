<?php
    require_once('event.class.php'); 
    require('../modelo/query.php'); 
    if(isset($_GET['option'])){
        $option = $_GET['option']; 
        $event = new Event(); 
        switch($option){
            case "save": 
                    $event->setName($_POST['name']); 
                    $event->setDesc($_POST['desc']); 
                    $event->setFecha($_POST['date']); 
                    $event->setIdUsuario($_POST['user']); 
                    $event->saveEvent(); 

                break; 
            case "delete":
                $event->setIdEvento($_POST['id']); 
                $event->deleteEventByID(); 
                break; 
            case "update": 
                $event->setName($_POST['name']); 
                $event->setDesc($_POST['desc']); 
                $event->setFecha($_POST['date']); 
                $event->setIdUsuario($_POST['user']);
                $event->setIdEvento($_POST['event']);
                $event->updateEvent(); 
                break;     
        }

    }else{
        echo "no se pudo obtener ningua opcion"; 
        die(); 
    }



?>