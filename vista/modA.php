<?php
session_start();
if($_SESSION["logueado"] == TRUE) {
    require("../controller/bd.php");
    $idAlumno=$_GET["id_alumno"];
    $consulta="SELECT * FROM alumnos WHERE id_alumno='$idAlumno'";
    $resultado=$conexion->query($consulta);
    while($fila=$resultado->fetch_array()){
        $nombre=$fila['nombre'];
        $matricula=$fila['matricula'];
    }


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
                            <h1>Modificar Alumno</h1>
                        </div>
                        <form action="../controller/modAlumno.php" method="POST">
                            
                                
                            
                            <div class="form-group mx-sm-4 pt-3">
                                <input type="text" name='nombre' placeholder="Nombre" class="form-control read" value="<?php echo $nombre; ?>">
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <input type="text" name='matricula' placeholder="Matricula" class="form-control read" value="<?php echo $matricula;  ?>">
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <label>Carrera</label>
                                <select name="carrera" id="cars" class="form-control">
                                    <option value='T??cnico Superior Universitario en Construcci??n'>
                                        T??cnico Superior Universitario en Construcci??n</option>
                                    <option value='Ingenier??a Civil'>
                                        Ingenier??a Civil</option>
                                    <option value='T??cnico Superior Universitario en Contadur??a'> 
                                        T??cnico Superior Universitario en Contadur??a</option>
                                    <option value='Licenciatura en Contadur??a'>
                                        Licenciatura en Contadur??a</option>
                                    <option value='T??cnico Superior Universitario en Agricultura Sustentable y Protegida'>
                                        T??cnico Superior Universitario en Agricultura Sustentable y Protegida</option>
                                    <option value='Ingenier??a en Agricultura Sustentable y Protegida'>
                                        Ingenier??a en Agricultura Sustentable y Protegida</option>
                                    <option value='T??cnico Superior Universitario en Tecnolog??as de la Informac??on, ??rea Desarrollo de Software Multiplataforma'>
                                        T??cnico Superior Universitario en Tecnolog??as de la Informaci??n, ??rea Desarrollo de Software Multiplataforma</option>
                                    <option value='Ingenier??a en Desarrollo y Gesti??n de Software'>
                                        Ingenier??a en Desarrollo y Gesti??n de Software</option>
                                    <option value='T??cnico Superior Universitario en Turismo,??rea Hoteler??a'>
                                        T??cnico Superior Universitario en Turismo,??rea Hoteler??a</option>
                                    <option value='Licenciatura en Gesti??n y Desarrollo Tur??stico'>
                                        Licenciatura en Gesti??n y Desarrollo Tur??stico</option>
                                </select>
                            </div>
                            <input type="text" name='id'  value="<?php echo $idAlumno; ?>" hidden>
                            <div class="form-group mx-sm-4 pb-2">
                                <center><input type="submit" name="enviar" class="btn btn-dark ingresar" value="Modificar"></center>
                            </div>
                        </form> 
                        <?php                 
                            
                        ?>       
                    </div>
                </main>
            </div>
            <!--fin de contenido-->
        </div>
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