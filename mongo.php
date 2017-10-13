<?php
    // Esta ruta debe apuntar al autocargador de Composer
    require 'vendor/autoload.php';

    $cliente =new MongoDB\Client("mongodb://localhost:27017");
    $collection = $cliente -> usuarios -> clientes;

    $resultado = $collection -> insertOne(['name' => "Héctor Flores", "edad" => 22, "email" => "frhectorin@gmail.com", "sexo" => true]);

    echo "Inserted with Object ID '{$resultado->getInsertedId()}'";




