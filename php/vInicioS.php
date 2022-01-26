<?php
        include("conexionBD.php");
    session_start();
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];


    $q = "SELECT COUNT(*) as contar FROM usuario WHERE usuarios = '$usuario' and password = '$password'";
    $consulta = mysqli_query($conexion,$q);
    $array = mysqli_fetch_array($consulta);
    if($array['contar']>0){
        header("location: ../inicio.php");
     }else{ ?>
        <script>
                    alert("Datos incorrectos");
                    window.location='../index.html';
            </script>
        <?php
    }
?>
