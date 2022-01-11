
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
                            <h1>Generar Constancia</h1>
                        </div>
                        <form action="../controller/generarCons.php" method="POST" target ="_blank">
                            <div class="form-group mx-sm-4 pt-3">
                                <input type="text" name='Alumno' placeholder="Matricula" value="091411" class="form-control read" required>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <label>Cuatrimestre</label>
                                <select name="cuatrimestre" id="cars" class="form-control">
                                    <option value='Primer'>Primer</option>
                                    <option value='Segundo'>Segundo</option>
                                    <option value='Tercer'>Tercer</option>
                                    <option value='Cuarto'>Cuarto</option>
                                    <option value='Quinto'>Quinto</option>
                                    <option value='Sexto'>Sexto</option>
                                    <option value='Septimo'>Septimo</option>
                                    <option value='Octavo'>Octavo</option>
                                    <option value='Noveno'>Noveno</option>
                                    <option value='Decimo'>Decimo</option>
                                    <option value='Onceavo'>Onceavo</option>
                                </select>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <label>Periodo</label>
                                <input type="text" name='periodo2' class="form-control read" placeholder="ejem: 06 de mayo al 27 de agosto del 2020" required>
                            </div>
                            <!--controlador que activa y desactiva el input de promedio-->
                            <script>
                                $( function() {
                                    $("#id_input").hide();
                                    $("#id_categoria").change( function() {
                                        if ($(this).val() === "2") {
                                            $("#id_input").show();
                                        } else {
                                            $("#id_input").hide();
                                        }
                                    });
                                });
                            </script>
                    <!--fin-->
                            <div class="form-group mx-sm-4 pt-3">
                                <label>Tipo de Constancia</label>
                                <select name='tCons' id="id_categoria" class="form-control">
                                    <option value='1' selected>Insripcion o de estudio </option>
                                    <option value='2'>promedio general</option>
                                    <option value='3'>Exento</option>
                                    <option value='4'>comprobar el pago de inscripcion</option>
                                    <option value='5'>Terminacion de estudios</option>
                                </select>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <input name='promedio' id="id_input" class="form-control read" placeholder="promedio general">
                            </div>
                            <div class="form-group mx-sm-4 pb-2">
                                <center><input type="submit" name="enviar" class="btn btn-dark ingresar" value="GENERAR"></center>
                            </div>
                        </form>  
                        <?php                 
                            if(isset($_GET["error"])){
                                $error=$_GET["error"];
                                echo "  
                                    <div class='alert alert-danger'>
                                    <center><a href='#' class='alert-link'>".$error."</a></center>
                                    </div>";
                            }
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