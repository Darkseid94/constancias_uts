<?php
    //verifica que los datos sean enviados por un boton llamado "enviar"
    if(isset($_POST["enviar"])) {
        require("bd.php");
        //recoleccion de datos y variables
        $nombre=$_POST["nombre"];
        $matricula=$_POST["matricula"];
        $carrera=$_POST["carrera"];
        echo $matricula;
        //fin recoleccion de datos
        //consulta para la verificacion de usuario exitente    
        $consulta="SELECT matricula FROM alumnos WHERE matricula='$matricula'";
        $query=mysqli_query($conexion, $consulta);
        
        if(mysqli_num_rows($query)==1){
            $error="el alumnos ya existe";
            Header("Location: ../vista/addAlumnos.php?error=".$error."");
            //fin de verificacion de usuario
        }else{
            //realizamos la insersion
            $consulta="INSERT INTO alumnos (nombre, matricula, carrera) VALUES ('$nombre','$matricula','$carrera')";//insercion a la base de datos
            mysqli_query($conexion, $consulta);//ejecusion de la consulta
            $conexion->close();  //serramos mysql
            $exito="Guardado";
            Header("Location: ../vista/addAlumnos.php?exito=".$exito."");
        }

    } else {
        header("Location: index.php");
    }
    //fin de verificacion de boton
?>