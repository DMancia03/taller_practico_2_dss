<?php

require_once("user.class.php");
require_once("../modelo/query.php");

if(isset($_POST["btnOperacion"]) || isset($_GET["operacion"])){
    $operacion = isset($_POST["btnOperacion"])?$_POST["btnOperacion"]:$_GET["operacion"];
    switch ($operacion) {
        case 'signup':
            $name = $_POST["txtName"];
            $lastname = $_POST["txtLastname"];
            $username = $_POST["txtUsername"];
            $pass = $_POST["txtPassword"];
            $user = new User($name, $lastname, $username, $pass);
            $estado = $user->save();
            if($estado){
                session_start();
                $_SESSION["user_activo"] = $user->getID();
                header("Location: ../dashboard.php");
            }else{
                header("Location: ../signup.php?error=1");
            }
            break;
        case 'logout':
            session_start();
            session_destroy();
            header("Location:../index.php");
            break;
        case 'login':
            $username = $_POST['txtUsername'];
            $pass = $_POST['txtPassword'];
            $resultado = false;
            $user = new User("", "", $username);
            $user->fill();
            $resultado = $user->login($pass);
            if($resultado){
                session_start();
                $_SESSION["user_activo"] = $user->getID();
                header("Location: ../dashboard.php");
            }else{
                header("Location:../index.php?error=1");
            }
            break;
        default:
            session_start();
            session_destroy();
            header("Location:../index.php");
            break;
    }
}else{
    header("Location:../index.php");
}

?>