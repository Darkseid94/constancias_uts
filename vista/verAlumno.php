<?php
session_start();
if($_SESSION["logueado"] == TRUE) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>UTS Rayon</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body class="sb-nav-fixed">
        <!--menu VERTICAL--->
        <?php require("menuV.php"); ?>
        <!--fin-->
        <div id="layoutSidenav">
            <!--menu horizontal--->
            <?php require("menuH.php"); ?>
            <!--fin-->
            <!--contenido aqui--->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="form-group text-center pt-3">
                            <h1>Alumnos</h1>
                            <form  method="GET" >
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="091411" placeholder="Buscar" name="buscar">
                                        <div class="input-group-append">
                                        <input  class="btn btn-outline-secondary" type="submit" name="submit" value="Buscar"/>
                                        </div>
                                </div>
                            </form>
                            <?php
                            //------------------------------------------------
                                if(isset($_GET["exito"])){
                                    $error2=$_GET["exito"];
                                    echo "  
                                        <div class='alert alert-success'>
                                        <center><a href='#' class='alert-link'>".$error2."</a></center>
                                        </div>";
                                }
                            //------------------------------------------------
							    include ('../controller/bd.php');
							    $auxBuscador="";
							    if(isset($_GET['buscar'])){
								    $auxBuscador=$_GET['buscar'];
							    }
                                if($auxBuscador==""){
                                    $consulta = "SELECT * FROM alumnos";
                                }else{
                                $consulta = "SELECT * FROM alumnos WHERE matricula='$auxBuscador'";
                                }
                                $resultado=$conexion->query($consulta);
                            ?>


                                

                                <table class="table table-dark table-hover">
                                    <thead >
                                        <th class="table-dark">Nombre</th>
                                        <th class="table-dark">Matricula</th>
                                        <th class="table-dark">Carrera</th>
                                        <th class="table-dark">Opciones</th>
                                    </thead >
                            <?php
                                while($fila = $resultado->fetch_array()){
                                        echo "<tr>";
                                        echo "<td class='table-dark'>".$fila['nombre']."</td>";
                                        echo "<td class='table-dark'>".$fila['matricula']."</td>";
                                        echo "<td class='table-dark'>".$fila['carrera']."</td>";
                                        echo "<td class='table-dark'><a href='../controller/eliminarA.php?id_alumno=".$fila['id_alumno']."' onclick='return eliminar()'>Eliminar</a>-
                                            <a href='modA.php?id_alumno=".$fila['id_alumno']."'>Modificar</a> - 
                                            <a href='verH.php?id_alumno=".$fila['id_alumno']."&nombre=".$fila['nombre']."'>Historial</a></td></td>";
                                        echo "</tr>";
                                }
                                $conexion->close();
                            ?>
                                </table>
                        </div>     
                    </div>
                </main>
            </div>
            <!--fin de contenido-->
        </div>
        <script src="../js/alert.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>

<?php
}
else
{
    echo "
        <html>
        <head>
            <meta http-equiv='REFRESH' content='0;url=../index.php'>
        </head>
        </html>";
}
?>