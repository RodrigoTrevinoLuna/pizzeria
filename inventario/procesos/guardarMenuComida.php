<?php 


include('../../php/conexionBD.php');
//form MenuComida
$producto = $_POST["comida"];
$precio = $_POST["precio"];
$tamano = $_POST["tamano"];
$clave = $_POST["clave"];
$checkbox = $_POST["checkbox"];


//guardar archivo en directorio
$directorio ="imagenes/";
$ruta = "imagenes/".$producto.".png";
$nombre=$_FILES['hojaDeVida']['name'];
$guardado=$_FILES['hojaDeVida']['tmp_name'];

	if(file_exists($ruta)){ ?> 
        <script> 
            alert("Este Nombre del platillo ya existe");
            window.location="../menuComida.php";
        </script>        
<?php
	}else{

        $nuevoId = 1;
$busqueda = "SELECT COUNT(*) as contar FROM  menucomida WHERE idComida='$nuevoId'";
$ejecutarbusqueda =mysqli_query($conexion,$busqueda);
$array = mysqli_fetch_array($ejecutarbusqueda);
if($array['contar']>0){
    do{
        $nuevoId++;
        $busqueda = "SELECT COUNT(*) as contar FROM  menucomida WHERE idComida='$nuevoId'";
        $ejecutarbusqueda =mysqli_query($conexion,$busqueda);
        $array = mysqli_fetch_array($ejecutarbusqueda);
    }while($array['contar']>0);
        $a= "INSERT INTO menucomida VALUES ('$nuevoId','$producto','$clave','$precio','$tamano')";
        $ejecutar =mysqli_query($conexion,$a);
         
        foreach($checkbox as $llave =>$valor){
            
            $ficha2="INSERT INTO ingredientes VALUES ('null','$valor','$nuevoId') ";
            $ejecutar_insertar_ficha2=mysqli_query($conexion, $ficha2);
        }
        ?> 
        <script>
        alert("Se Guardó Correctamente el platillo");
        window.location="../menuComida.php";
        </script>
        <?php
    }else{
        $a= "INSERT INTO menucomida VALUES ('$nuevoId','$producto','$clave','$precio','$tamano')";
        $ejecutar =mysqli_query($conexion,$a);
        foreach($checkbox as $llave =>$valor){
            $ficha2="INSERT INTO ingredientes VALUES ('null','$valor','$nuevoId') ";
            $ejecutar_insertar_ficha2=mysqli_query($conexion, $ficha2);
        }
        ?> 
        <script>
        alert("Se Guardó Correctamente el platillo")
        window.location="../menuComida.php";
        </script>
        <?php
    }
        
    if(move_uploaded_file($guardado, $directorio.$producto.".png")){
            //echo "Archivo guardado con exito";
    
        }else{
            //echo "Archivo no se pudo guardar";
        }   

    }
    

?>