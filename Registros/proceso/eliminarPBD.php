<?php
                        include('../../php/conexionBD.php');
                        $id = $_POST["id"];
                        $sql = "DELETE FROM proveedor WHERE idProveedor='$id'";
                        $ejecutar = mysqli_query($conexion,$sql);
                        if(!$ejecutar){
                            ?>
                            <script>
                            alert("hubo un error");
                            window.location="../proveedores.php";
                            </script>
                            <?php
                        }else{
                            ?>
                            <script>
                            alert("Se elimino correctamente los datos");
                            window.location="../proveedores.php";
                            </script>
                            <?php
                        }
                    ?>