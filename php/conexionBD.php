<?php
    $usuario = "root";
    $password = "";
    $server = "localhost";
    $BD = "pizzeria";

    $conexion = mysqli_connect  ($server,$usuario,"") or die ("Error con el servidor de la Base de datos"); 
    $db = mysqli_select_db($conexion, $BD) or die ("Error conexion al conectarse a la Base de datos");
?>