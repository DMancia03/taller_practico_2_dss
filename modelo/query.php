<?php
require_once("conection.php");

class Query{
    public function getEventos(){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT * FROM evento";
        $sentencia= $connection->prepare($sql);

        if(!$sentencia){
            return null;
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            
        }
    }

    public function getEventosByCategoria($idCategoria){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT * FROM evento ";
        $sql .= "INNER JOIN detalle_eventocategoria ";
        $sql .= "ON evento.idEvento = detalle_eventocategoria.idEvento ";
        $sql .= "WHERE detalle_eventocategoria.idCategoria = :id";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":id", $idCategoria); 
        if(!$sentencia){
            return null;
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            
        }
    }

    public function getEventoByID($idEvento){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT * FROM evento WHERE IdEvento = :id";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":id", $idEvento); 
        if(!$sentencia){
            return null;
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
            
        }
    }

    public function getEventoByName($nameTitulo){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT IdEvento FROM evento WHERE Titulo = :nameE";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":nameE", $nameTitulo); 
        if(!$sentencia){
            return null;
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
            
        }
    }

    public function getEventoByNameAndId($nameTitulo, $idEvento){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT IdEvento FROM evento WHERE Titulo = :nameE ";
        $sql .= $idEvento!=""?"AND idEvento != :id":"";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":nameE", $nameTitulo);
        if($idEvento != ""){
            $sentencia->bindParam(":id", $idEvento);
        }

        if(!$sentencia){
            return null;
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
            
        }
    }

    public function insertEvento($titulo, $descripcion, $fechaInicio, $fechaFin, $tipoEvento, $maximoPersonas, $banner){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "INSERT INTO evento (Titulo, Descripcion, FechaInicio, FechaFin, TipoEvento, MaximoPersonas, Banner) VALUES (:titulo, :d, :fechaI, :fechaF, :tipo, :maximoP, :banner)";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":titulo", $titulo);
        $sentencia->bindParam(":d", $descripcion);
        $sentencia->bindParam(":fechaI", $fechaInicio);
        $sentencia->bindParam(":fechaF", $fechaFin);
        $sentencia->bindParam(":tipo", $tipoEvento);
        $sentencia->bindParam(":maximoP", $maximoPersonas);
        $sentencia->bindParam(":banner", $banner);
        if(!$sentencia){
            return false;
        }else{
            $sentencia->execute();
            return true;
        }
    }

    public function updateEvento($id, $titulo, $descripcion, $fechaInicio, $fechaFin, $tipoEvento, $maximoPersonas, $banner = ""){
        //Comprobar banner
        $bannersql = $banner!=""?", Banner = :banner ":$banner;
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "UPDATE evento SET Titulo = :titulo, Descripcion = :d, FechaInicio = :fechaI, FechaFin = :fechaI, TipoEvento = :tipo, MaximoPersonas = :maximoP ";
        $sql .= $bannersql;
        $sql .= "WHERE idEvento = :id";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":titulo", $titulo);
        $sentencia->bindParam(":d", $descripcion);
        $sentencia->bindParam(":fechaI", $fechaInicio);
        $sentencia->bindParam(":fechaF", $fechaFin);
        $sentencia->bindParam(":tipo", $tipoEvento);
        $sentencia->bindParam(":maximoP", $maximoPersonas);
        if($banner != ""){
            $sentencia->bindParam(":banner", $banner);
        }
        $sentencia->bindParam(":id", $id);
        if(!$sentencia){
            return false;
        }else{
            $sentencia->execute();
            return true;
        }
    }

    public function deleteEvento($id){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "DELETE FROM evento ";
        $sql .= "WHERE idEvento = :id";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":id", $id);
        if(!$sentencia){
            return false;
        }else{
            $sentencia->execute();
            return true;
        }
    }
}
?>