<?php
                        include('../../php/conexionBD.php');
                        $id = $_POST["id"];
                        $sql = "DELETE FROM usuario WHERE idUsuario='$id'";
                        $ejecutar = mysqli_query($conexion,$sql);
                        if(!$ejecutar){
                            ?>
                            <script>
                            alert("hubo un error");
                            
                            </script>
                            <?php
                        }else{
                            ?>
                            <script>
                            alert("Se elimino correctamente los datos");
                            window.location="../usuario.php";
                            </script>
                            <?php
                        }
                    ?>