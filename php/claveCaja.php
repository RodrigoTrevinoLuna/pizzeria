<?php
    include('conexionBD.php');

$clave = $_POST['clave'];


$q = "SELECT COUNT(*) as contar FROM usuario WHERE nivelAcceso = 'Caja' and password = '$clave'";
$consulta = mysqli_query($conexion,$q);
$array = mysqli_fetch_array($consulta);
if($array['contar']>0){
    header("location: ../puntoVenta/caja.php");
 }else{ ?>
    <script>
                alert("Datos incorrectos");
                window.location='../inicio.php';
        </script>
    <?php
}

?>