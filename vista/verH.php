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
                            <?php $nombre = $_GET["nombre"];
                                    $id_alumno=$_GET["id_alumno"]; ?>
                            <h2>Historia de pago de <b><?php echo $nombre; ?></b></h2>
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
                            ?>
                            <form  method="GET" >
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Buscar" name="buscar">
                                    <input type="hidden" value="<?php echo $nombre ?>" name="nombre">
                                    <input type="hidden" value="<?php echo $id_alumno ?>" name="id_alumno">
                                        <div class="input-group-append">
                                        <input  class="btn btn-outline-secondary" type="submit" name="submit" value="Buscar"/>
                                        </div>
                                </div>
                            </form>
                            <?php
							    include ('../controller/bd.php');
                                
							    $auxBuscador="";
							    if(isset($_GET['buscar'])){
								    $auxBuscador=$_GET['buscar'];
							    }
                                if($auxBuscador==""){
                                    $consulta = "select * from alumnos a INNER JOIN historial h on a.id_alumno='$id_alumno' AND h.fk_alum='$id_alumno'";
                                }else{
                                $consulta = "select * from alumnos a INNER JOIN historial h on a.id_alumno='$id_alumno' AND h.fk_alum='$id_alumno' WHERE h.concepto like'%$auxBuscador%'";
                                }
                                $resultado=$conexion->query($consulta);
                            ?>
                            <table class="table table-dark table-hover">
                                    <thead >
                                        <th class="table-dark">Concepto</th>
                                        <th class="table-dark">Monto</th>
                                        <th class="table-dark">Folio</th>
                                        <th class="table-dark">Banco</th>
                                        <th class="table-dark">Periodo</th>
                                        <th class="table-dark">Fecha de regsitro</th>
                                        <th class="table-dark">Observación</th>
                                        <th class="table-dark">Opciones</th>
                                    </thead >
                            <?php
                                while($fila = $resultado->fetch_array()){

                                
                                        echo "<tr>";
                                        echo "<td class='table-dark'>".$fila['concepto']."</td>";
                                        echo "<td class='table-dark'>".$fila['monto']."</td>";
                                        echo "<td class='table-dark'>".$fila['folio']."</td>";
                                        echo "<td class='table-dark'>".$fila['banco']."</td>";
                                        echo "<td class='table-dark'>".$fila['periodo']." del ".$fila["anio"]."</td>";
                                        echo "<td class='table-dark'>".$fila['fechaR']."</td>";
                                        echo "<td class='table-dark'>".$fila['observacion']."</td>";
                                        echo "<td class='table-dark'><a href='../controller/eliminarH.php?id_his=".$fila['id_his']."&nombreE=".$nombre."&id_alE=".$id_alumno."' onclick='return eliminarH()'>Eliminar</a>-
                                            <a href='modH.php?id_his=".$fila['id_his']."&nombreE=".$nombre."&id_alE=".$id_alumno."'>Modificar</a>";
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