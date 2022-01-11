
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
                            <h1>Agregar Historial</h1>
                        </div>
                        <?php                 
                            if(isset($_GET["error"])){
                                $error=$_GET["error"];
                                echo "  
                                    <div class='alert alert-danger'>
                                    <center><a href='#' class='alert-link'>".$error."</a></center>
                                    </div>";
                            }else if(isset($_GET["exito"])){
                                $error2=$_GET["exito"];
                                echo "  
                                    <div class='alert alert-success'>
                                    <center><a href='#' class='alert-link'>".$error2."</a></center>
                                    </div>";
                            }
                        ?> 
                        <form action="../controller/addhisto.php" method="POST">
                            <div class="form-group mx-sm-4 pt-3">
                                <input type="text" name='mat' placeholder="Matricula" class="form-control read" required>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <label>Concepto</label>
                                <select name="conc" id="cars" class="form-control">
                                    <option value='Ficha'>
                                        Ficha</option>
                                    <option value='Inscripción'>
                                        Inscripción</option>
                                    <option value='Colegiatura'> 
                                        Colegiatura</option>
                                    <option value='Global'>
                                        Global</option>
                                    <option value='Titulación'>
                                        Titulación</option>
                                </select>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <input type="text" name='monto' placeholder="Monto" class="form-control read" required>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <input type="text" name='folio' placeholder="folio" class="form-control read" required>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <label>Banco</label>
                                <select name="banco" id="cars" class="form-control">
                                    <option value='Banco Azteca'>
                                        Banco Azteca</option>
                                    <option value='Santander'>
                                        Santander</option>
                                    <option value='Banamex'> 
                                        Banamex</option>
                                </select>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <label>Periodo</label>
                                <select name="peri" id="cars" class="form-control">
                                    <option value='Enero - Abril'>
                                        Enero - Abril</option>
                                    <option value='Mayo - Agosto'>
                                        Mayo - Agosto</option>
                                    <option value='Septiembre - Diciembre'> 
                                        Septiembre - Diciembre</option>
                                </select>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <input type="text" name='anio' placeholder="Año" class="form-control read" required>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <input type="text" name='obs' placeholder="Observación" class="form-control read">
                            </div>
                            <div class="form-group mx-sm-4 pb-2">
                                <center><input type="submit" name="enviar" class="btn btn-dark ingresar" value="Agregar"></center>
                            </div>
                        </form> 
                             
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