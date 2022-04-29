<?php

class Conection{
    //Método conexión
    public function _getConection(){
        //SERVIDOR LOCALHOST
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "calendar_taller";
        
        try{
            $conectar = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
            //echo "Conexion lograda"; 
        }catch(PDOException $e){
            echo $e->getMessage(); 
        }
        
        
        return $conectar;
    }
}

?>