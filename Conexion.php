<?php

    $servidor = "localhost";
    $User = "root";
    $pass = "";

    $BD = "paginaweb_bd";

    $conexion = mysqli_connect($servidor, $User, $pass, $BD);

    if (!$conexion) {
        echo "Conexion fallida";
    }

?>