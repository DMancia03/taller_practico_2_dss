<?php
require_once("conection.php");

class Query{
    //USERS
    //Insert
    public function insertUser($name, $lastname, $username, $password){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "INSERT INTO user (Name, LastName, Username, Password) VALUES (:nombre, :apellido, :usuario, :contra)";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":nombre", $name);
        $sentencia->bindParam(":apellido", $lastname);
        $sentencia->bindParam(":usuario", $username);
        $sentencia->bindParam(":contra", $password);
        if(!$sentencia){
            return false;
        }else{
            $sentencia->execute();
            return true;
        }
    }

    //Get one user by username
    public function getUserWithUsername($username){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT * FROM user WHERE Username = :user";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":user", $username);
        if(!$sentencia){
            return null;
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
            
        }
    }

    //Get one user by id
    public function getUserWithID($id){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT * FROM user WHERE idUser = :id";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":id", $id);
        if(!$sentencia){
            return null;
        }else{
            $sentencia->execute();
            $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            return $resultado;
            
        }
    }

    public function insertEvent($name, $date, $desc, $userID){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "INSERT INTO event VALUES (null, :name, :date, :desc,'s',:user )";
        $statement = $connection->prepare($sql); 
        $statement->bindParam(":name", $name); 
        $statement->bindParam(":desc", $desc); 
        $statement->bindParam(":date", $date); 
        $statement->bindParam(":user", $userID); 
        if(!$statement){
            return false;
        }else{
            $statement->execute();
            return true;
        }
    }
    public function getEventosbyUserID($id){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "SELECT * FROM event WHERE User_idUser = :id  ORDER BY `StartDate` ASC";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":id", $id); 
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
        $sql = "SELECT * FROM event WHERE IdEvent = :id";
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

    public function updateEvento($id, $titulo, $descripcion, $fechaInicio){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "UPDATE event SET name = :titulo, Description = :d, StartDate = :fechaI ";
        $sql .= "WHERE idEvent = :id";
        $sentencia= $connection->prepare($sql);
        $sentencia->bindParam(":titulo", $titulo);
        $sentencia->bindParam(":d", $descripcion);
        $sentencia->bindParam(":fechaI", $fechaInicio);
        $sentencia->bindParam(":id", $id);
        if(!$sentencia){
            return false;
        }else{
            $sentencia->execute();
            return true;
        }
    }

    public function deleteEvent($id){
        $model = new Conection();
        $connection  = $model->_getConection();
        $sql = "DELETE FROM event ";
        $sql .= "WHERE idEvent = :id";
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