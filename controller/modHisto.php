<?php
    //verifica que los datos sean enviados por un boton llamado "enviar"
    if(isset($_POST["enviar"])) {
        require("bd.php");
        //recoleccion de datos y variables
        $concepto=$_POST["conc"];
        $monto=$_POST["monto"];
        $folio=$_POST["folio"];
        $banco=$_POST["banco"];
        $peri=$_POST["peri"];
        $anio=$_POST["anio"];
        $obs=$_POST["obs"];
        $id=$_POST["id"];
        $nombreE=$_POST["nombreE"];
        $id_alE=$_POST["id_alE"];

        echo $concepto." ".$monto." ".$folio." ".$banco." ".$peri." ".$anio." ".$obs." ".$id;
      
         $consulta="UPDATE `historial` SET `concepto`='$concepto',
         `monto`='$monto',`folio`='$folio',`banco`='$banco',`periodo`='$peri',
         `anio`='$anio',`observacion`='$obs' WHERE id_his='$id'";//insercion a la base de datos
            mysqli_query($conexion, $consulta);//ejecusion de la consulta
            $conexion->close();  //serramos mysql
            $exito="<B>Historial</B> modificado con exito";
            Header("Location:../vista/verH.php?exito=$exito&nombre=$nombreE&id_alumno=$id_alE");
    } else {
        header("Location: index.php");
    }

    ?>