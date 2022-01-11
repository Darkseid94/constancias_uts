<?php
session_start();
if($_SESSION["logueado"] == TRUE) {
    require("../controller/bd.php");
    $idH=$_GET["id_his"];
    $nombreE=$_GET["nombreE"];
    $id_alE=$_GET["id_alE"];
   
    $consulta="SELECT * FROM historial WHERE id_his='$idH'";
    $resultado=$conexion->query($consulta);
    while($fila=$resultado->fetch_array()){
        $concepto=$fila['concepto'];
        $monto=$fila['monto'];
        $folio=$fila['folio'];
        $banco=$fila['banco'];
        $periodo=$fila['periodo'];
        $anio=$fila['anio'];
        $obs=$fila['observacion'];
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
                        
                        <form action="../controller/modHisto.php" method="POST">
                            <div class="form-group mx-sm-4 pt-3">
                                <label>Concepto</label>
                                <select name="conc" id="cars" class="form-control">
                                    <?php
                                        if($concepto=="Ficha"){
                                            echo"
                                            <option value='Ficha' selected>
                                                Ficha</option>
                                            <option value='Inscripción'>
                                                Inscripción</option>
                                            <option value='Colegiatura'> 
                                                Colegiatura</option>
                                            <option value='Global'>
                                                Global</option>
                                            <option value='Titulación'>
                                                Titulación</option>
                                            ";
                                        }elseif($concepto=="Inscripción"){
                                            echo"
                                            <option value='Ficha'>
                                                Ficha</option>
                                            <option value='Inscripción' selected>
                                                Inscripción</option>
                                            <option value='Colegiatura'> 
                                                Colegiatura</option>
                                            <option value='Global'>
                                                Global</option>
                                            <option value='Titulación'>
                                                Titulación</option>
                                            ";
                                        }elseif($concepto=="Colegiatura"){
                                            echo"
                                            <option value='Ficha'>
                                                Ficha</option>
                                            <option value='Inscripción'>
                                                Inscripción</option>
                                            <option value='Colegiatura' selected> 
                                                Colegiatura</option>
                                            <option value='Global'>
                                                Global</option>
                                            <option value='Titulación'>
                                                Titulación</option>
                                            ";
                                        }elseif($concepto=="Global"){
                                            echo"
                                            <option value='Ficha'>
                                                Ficha</option>
                                            <option value='Inscripción'>
                                                Inscripción</option>
                                            <option value='Colegiatura'> 
                                                Colegiatura</option>
                                            <option value='Global' selected>
                                                Global</option>
                                            <option value='Titulación'>
                                                Titulación</option>
                                            ";
                                        }elseif($concepto=="Titulación"){
                                            echo"
                                            <option value='Ficha'>
                                                Ficha</option>
                                            <option value='Inscripción'>
                                                Inscripción</option>
                                            <option value='Colegiatura'> 
                                                Colegiatura</option>
                                            <option value='Global'>
                                                Global</option>
                                            <option value='Titulación' selected>
                                                Titulación</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <input type="text" name='monto' placeholder="Monto" value="<?php echo $monto; ?>" class="form-control read" required>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <input type="text" name='folio' placeholder="folio" value="<?php echo $folio; ?>" class="form-control read" required>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <label>Banco</label>
                                <select name="banco" id="cars" class="form-control">
                                    <?php
                                        if($banco=="Banco Azteca"){
                                            echo"
                                            <option value='Banco Azteca' selected>
                                                Banco Azteca</option>
                                            <option value='Santander'>
                                                Santander</option>
                                            <option value='Banamex'> 
                                                Banamex</option>
                                            ";
                                        }elseif($banco=="Santander"){
                                            echo"
                                            <option value='Banco Azteca'>
                                                Banco Azteca</option>
                                            <option value='Santander' selected>
                                                Santander</option>
                                            <option value='Banamex'> 
                                                Banamex</option>
                                            ";
                                        }elseif($banco=="Banamex"){
                                            echo"
                                            <option value='Banco Azteca'>
                                                Banco Azteca</option>
                                            <option value='Santander'>
                                                Santander</option>
                                            <option value='Banamex' selected> 
                                                Banamex</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <label>Periodo</label>
                                <select name="peri" id="cars" class="form-control">
                                    <?php
                                    if($periodo=="Enero - Abril"){
                                        echo "
                                        <option value='Enero - Abril' selected>
                                            Enero - Abril</option>
                                        <option value='Mayo - Agosto'>
                                            Mayo - Agosto</option>
                                        <option value='Septiembre - Diciembre'> 
                                            Septiembre - Diciembre</option>
                                        ";
                                    }elseif($periodo=="Mayo - Agosto"){
                                        echo "
                                        <option value='Enero - Abril'>
                                            Enero - Abril</option>
                                        <option value='Mayo - Agosto' selected>
                                            Mayo - Agosto</option>
                                        <option value='Septiembre - Diciembre'> 
                                            Septiembre - Diciembre</option>
                                        ";
                                    }elseif($periodo=="Septiembre - Diciembre"){
                                        echo "
                                        <option value='Enero - Abril'>
                                            Enero - Abril</option>
                                        <option value='Mayo - Agosto'>
                                            Mayo - Agosto</option>
                                        <option value='Septiembre - Diciembre' selected> 
                                            Septiembre - Diciembre</option>
                                        ";
                                    }
                                        
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <input type="text" name='anio' placeholder="Año" value="<?php echo $anio; ?>" class="form-control read" required>
                            </div>
                            <div class="form-group mx-sm-4 pt-3">
                                <input type="text" name='obs' placeholder="Observación" value="<?php echo $obs; ?>" class="form-control read">
                            </div>
                            <input type="text" name='id' value="<?php echo $idH; ?>" hidden>
                            <input type="text" name='nombreE' value="<?php echo $nombreE; ?>" hidden>
                            <input type="text" name='id_alE' value="<?php echo $id_alE; ?>" hidden>
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