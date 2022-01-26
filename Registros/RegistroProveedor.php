<?php
include('../php/conexionBD.php');
//Registro Proveedores
$nombreP =$_POST['proveedor'];
$tel = $_POST['telefono'];
$correo = $_POST['correo'];
$dire = $_POST['direccion'];

$sqlP= "INSERT INTO proveedor  VALUES ('null','$nombreP','$tel','$correo','$dire')";

$ejecutarP = mysqli_query($conexion,$sqlP);

if(!$ejecutarP){
    ?>
    <script>
    alert("hubo un error");
    window.location='proveedores.php'; 
    </script>
    <?php
}else{
    ?>
    <script>
    alert("Se guardaron correctamente los datos");
    window.location='proveedores.php'; 
    </script>
    <?php
}
?>