<?php
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $usuarios = $_POST["usuarios"];
    $passwords = $_POST["passwords"];
    $nivelAcceso = $_POST["nivelAcceso"];
    


    include('../../php/conexionBD.php');

    $sql= "UPDATE  usuario  SET nombre = '$nombre', usuarios = '$usuarios', password = '$passwords', nivelAcceso = '$nivelAcceso' WHERE idUsuario ='$id'";
    $ejecutar = mysqli_query($conexion,$sql);

    if(!$ejecutar){
        ?>
        <script>
        alert("Hubo un error");
         
        </script>
        <?php
    }else{
        ?>
        <script>
        alert("Se Guardaron Correctamente los Cambios");
        window.location="../usuario.php";
        </script>
        <?php
    }
?>