<?php

// Esta ruta debe apuntar al autocargador de Composer
    require 'vendor/autoload.php';
    session_start();

    $cliente =new MongoDB\Client("mongodb://localhost:27017");
    $collection = $cliente -> usuarios -> clientes;

    $collection -> createIndex(array("email" => 1), array("unique" => 1));

    $resultado = null;

    if(isset($_POST["session"]) && count($_POST["session"]) == 5 && empty($_POST["session"]["name"]) == 0 && empty($_POST["session"]["age"]) == 0 && empty($_POST["session"]["email"]) == 0 && empty($_POST["session"]["password"]) == 0 && empty($_POST["session"]["gender"]) == 0){
	
    try{

       foreach ($_POST["session"] as $key => $value) {
          $_SESSION[$key] = trim($value);
       }
       
       $resultado = $collection -> insertOne(['name' => htmlspecialchars(trim($_POST["session"]["name"])), "edad" => htmlspecialchars(trim($_POST["session"]["age"])),"sexo" => htmlspecialchars(trim($_POST["session"]["gender"])), "email" => htmlspecialchars(trim($_POST["session"]["email"])), "password" => password_hash(htmlspecialchars($_POST["session"]["password"]),PASSWORD_DEFAULT)]);

       if($_POST["remember"] == "on"){
          $_SESSION["message"]["type"] = "success";
          $_SESSION["message"]["text"] = "El usuario se creo exitosamente";
          $_SESSION["login"] = $resultado->getInsertedId();
          header('Location: show.php');
       }else{
	  $_SESSION["message"]["type"] = "success";
          $_SESSION["message"]["text"] = "Tu usuario fue creado exitosamente, intenta logearte";
          header('Location: index.php');
       }
       exit();
    } catch(Exception $e){
       echo strpos($e->getMessage(),"duplicate key");
       if(strpos($e->getMessage(),"duplicate key") !== false){ 
       	 $_SESSION["message"]["type"] = "danger";
         $_SESSION["message"]["text"] = "Ese email ya existe";
	 header('Location: register.php');
    	 exit();
       }else{
         $_SESSION["message"]["type"] = "warning";
         $_SESSION["message"]["text"] = "Algo salio mal, por favor checa todos los datos";
	 header('Location: register.php');
    	 exit();
       }
    }
    }else{
	$_SESSION["message"]["type"] = "danger";
        $_SESSION["message"]["text"] = "La información no esta completa";
        header('Location: register.php');
    	exit();
    }


