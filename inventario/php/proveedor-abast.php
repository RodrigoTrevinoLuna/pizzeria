<?php
    include('../../php/conexionBD.php');

$clave = $_POST['clave'];


$q = "SELECT COUNT(*) as contar FROM usuario WHERE nivelAcceso = 'Admin' and password = '$clave'";
$consulta = mysqli_query($conexion,$q);
$array = mysqli_fetch_array($consulta);
if($array['contar']>0){
    header("location: ../../Registros/proveedores.php");
 }else{ ?>
    <script>
               
               alert("Datos incorrectos");
                    window.location='../AbastMP.php';
        </script>
    <?php
}

?>