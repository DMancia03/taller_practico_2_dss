<?php

class User{
    //Atributos
    protected int $id;
    protected string $name;
    protected string $lastname;
    protected string $username;
    protected string $password;

    //Setter
    public function setID($newID){
        $this->id = $newID;
    }

    public function setName($newName){
        $this->name = $newName;
    }

    public function setLastname($newLastname){
        $this->lastname = $newLastname;
    }
    
    public function setUsername($newUsername){
        $this->username = $newUsername;
    }

    public function setPassword($newPassword){
        $this->password = $newPassword;
    }

    //Getter
    public function getID(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getLastname(){
        return $this->lastname;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    //Constructor
    public function __construct($newName  = "", $newLastname  = "", $newUsername  = "", $newPassword = "", $newID  = 0){
        $this->setID($newID);
        $this->setName($newName);
        $this->setLastname($newLastname);
        $this->setUsername($newUsername);
        $this->setPassword($newPassword);
    }

    //Metodos
    public function getHashPassword(){
        return password_hash($this->getPassword(), PASSWORD_BCRYPT);
    }

    public function save(){
        $query = new Query();
        $resultado = false;
        $resultado = $query->insertUser($this->getName(), $this->getLastname(), $this->getUsername(), $this->getHashPassword());
        $row = $query->getUserWithUsername($this->getUsername());
        $this->setID($row["idUser"]);
        return $resultado;
    }

    public function fill(){
        $query = new Query();
        if( $this->getID() == 0 ){
            $row = $query->getUserWithUsername($this->getUsername());
        }else{
            $row = $query->getUserWithID($this->getID());
        }
        if(is_array($row)){
            $this->setID($row["idUser"]);
            $this->setName($row["Name"]);
            $this->setLastname($row["LastName"]);
            $this->setPassword($row["Password"]);
        }
    }

    public function login($tryPassword){
        return password_verify($tryPassword, $this->getPassword());
    }
}

?>