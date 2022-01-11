<?php
    //verifica que los datos sean enviados por un boton llamado "enviar"
    if(isset($_POST["enviar"])) {
        date_default_timezone_set('America/Mexico_City');
        require("bd.php");
        //recoleccion de datos y variables
        $mat=$_POST["mat"];
        $conc=$_POST["conc"];
        $monto=$_POST["monto"];
        $folio=$_POST["folio"];
        $banco=$_POST["banco"];
        $peri=$_POST["peri"];
        $anio=$_POST["anio"];
        $obs=$_POST["obs"];
        //echo $matricula;
        $fechaA=date("d-m-y");

        $consulta="SELECT id_alumno FROM alumnos WHERE matricula='$mat'";
        if($resultado = $conexion->query($consulta)) {
            //guardamos los datos extraidos de la bd en una variable 
            while($row = $resultado->fetch_array()) {
                $id_alum = $row["id_alumno"];
            }
        }
        //echo "alumno: ".$id_alum;
        if($id_alum==""){
            $error="El alumno no existe";
            Header("Location: ../vista/hysto.php?error=".$error."");
            
        }else{
            //realizamos la insersion
            $consulta="INSERT INTO historial(concepto, monto, folio, banco,
            periodo, anio, observacion, fechaR, fk_alum) 
            VALUES ('$conc','$ ".$monto."','$folio',
            '$banco','$peri','$anio','$obs','$fechaA','$id_alum')";//insercion a la base de datos
            mysqli_query($conexion, $consulta);//ejecusion de la consulta
            $conexion->close(); //serramos mysql
            $exito="Guardado";
            Header("Location: ../vista/hysto.php?exito=".$exito."");
        }
        

    } else {
        header("Location: index.php");
    }
    //fin de verificacion de boton
?>