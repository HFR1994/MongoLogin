<?php

// Esta ruta debe apuntar al autocargador de Composer
    require 'vendor/autoload.php';
    session_start();

    $cliente =new MongoDB\Client("mongodb://localhost:27017");
    $collection = $cliente -> usuarios -> clientes;

    $resultado = null;

    if(isset($_POST["session"]) && count($_POST["session"]) == 2){
	
    try{
      $cursor = $collection -> find(["email" => htmlspecialchars(trim($_POST["session"]["email"]))]);

      $resul = iterator_to_array($cursor);

      if(count($resul) > 0){
         $current = $resul[0];
	 if(password_verify($_POST["session"]["password"],$current["password"])){
	    $_SESSION["name"] = trim($current["name"]);
	    $_SESSION["age"] = trim($current["edad"]);
	    $_SESSION["gender"] = trim($current["sexo"]);
	    $_SESSION["email"] = trim($current["email"]);
            $_SESSION["login"] = $current["_id"];
            header('Location: show.php');
    	    exit();
	 }else{
	    $_SESSION["message"]["type"] = "danger";
            $_SESSION["message"]["text"] = "El usuario o contraseña es incorrecto";
            header('Location: index.php');
    	    exit();
	 }
      }else{
	$_SESSION["message"]["type"] = "danger";
        $_SESSION["message"]["text"] = "El usuario o contraseña es incorrecto";
        header('Location: index.php');
    	exit();
      }
    }catch(Exception $e){

    }
 }else{
	$_SESSION["message"]["type"] = "danger";
        $_SESSION["message"]["text"] = "La información no esta completa";
        header('Location: index.php');
    	exit();
}
