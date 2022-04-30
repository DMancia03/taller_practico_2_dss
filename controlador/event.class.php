<?php
class Event{
    private $name, $fecha, $desc, $idUsuario, $idEvento;
    
    public function setName($name){
        $this->name = $name; 
    }
    public function setFecha($fecha){
        $this->fecha = $fecha; 
    }
    public function setDesc($desc){
        $this->desc = $desc; 
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario; 
    }
    public function setIdEvento($id){
        $this->idEvento = $id; 
    }
    public function getName(){
        return $this->name; 
    }
    public function getIdEvento(){
        return $this->idEvento; 
    }
    public function getFecha(){
        return $this->fecha; 
    }
    public function getIdUsario(){
        return $this->idUsuario; 
    }
    public function getDesc(){
        return $this->desc; 
    }
    public function saveEvent(){
        $dbHandler = new Query(); 
        if($dbHandler->insertEvent($this->name, $this->fecha, $this->desc, $this->idUsuario)){
            echo "Guardado con exito"; 
        }
    }
    public function getEventsByUserID(){
        $dbHandler = new Query();
        $result = $dbHandler->getEventosbyUserID($this->idUsuario); 
        if(is_array($result)){
            return $result; 
        }else{
            return "Todavia no has creado un evento"; 
        }
    }
    public function deleteEventByID(){

        $dbHandler = new Query(); 
        if($dbHandler->deleteEvent($this->idEvento)){
            echo true; 
        } else{
            echo false; 
        }

    }
    public function getAnEvent(){
        $dbHandler = new Query();
        $result = $dbHandler->getEventoByID($this->idEvento); 
        if(is_array($result)){
            return $result; 
        }else{
            return "Todavia no has creado un evento"; 
        }
    }
    public function updateEvent(){
        $dbHandler = new Query(); 
        if($dbHandler->updateEvento($this->idEvento, $this->name, $this->desc, $this->fecha)){
            echo true; 
        } else{
            echo false; 
        }
    }
}


?>