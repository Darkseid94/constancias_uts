<?php
    //verifica que los datos sean enviados por un boton llamado "enviar"
    if(isset($_POST["enviar"])) {
        require("bd.php");
        //recoleccion de datos y variables
        $nombre=$_POST["nombre"];
        $id=$_POST["id"];
        $matricula=$_POST["matricula"];
        $carrera=$_POST["carrera"];
        //echo $matricula;
        //fin recoleccion de datos
            //realizamos la insersion
            $consulta="UPDATE alumnos SET nombre='$nombre', matricula='$matricula',carrera='$carrera' WHERE id_alumno='$id'";//insercion a la base de datos
            mysqli_query($conexion, $consulta);//ejecusion de la consulta
            $conexion->close();  //serramos mysql
            $exito="Alumno <B>".$nombre."</B> modificado con exito";
            Header("Location: ../vista/verAlumno.php?exito=".$exito."");
    } else {
        header("Location: index.php");
    }