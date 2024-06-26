<?php

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'srv18bdvaleria', 'bienesraices_crud');

    if (!$db){
        echo "Error no se pudo contectar";
        exit;
    }

    return $db;

}