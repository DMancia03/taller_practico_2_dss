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
    public function __construct($newID  = 0, $newName  = "", $newLastname  = "", $newUsername  = "", $newPassword = ""){
        setID($newID);
        setName($newName);
        setLastname($newLastname);
        setUsername($newUsername);
        setPassword($newPassword);
    }

    //Metodos
}

?>