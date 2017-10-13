<?php

// Esta ruta debe apuntar al autocargador de Composer
    require 'vendor/autoload.php';
    session_start();

    session_destroy();

    header('Location: index.php');
    exit();
