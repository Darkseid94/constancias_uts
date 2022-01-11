<?php
    
    require("bd.php");
    $eliminar=$_GET["id_alumno"];

        //verificamos primero si no existe ninguan aconexion foranea
        $consulta2="SELECT * from alumnos a INNER JOIN historial h on a.id_alumno='$eliminar' AND h.fk_alum='$eliminar'";
        if($query2=mysqli_query($conexion, $consulta2)) {
            while($row2 = $query2->fetch_array()) {
                echo $id_a=$row2["id_alumno"];
            }
        }

        
        if (isset($id_a)){
            //si existe una conexion mandamos un mensaje
            echo "<script> 
                    window.alert('Para eliminar este usuario primero borra su historial'); 
                    location.href ='../vista/verAlumno.php';
                </script>";

        }else{
            //si no existe ninguna conexion eliminamos

            $consulta="DELETE FROM alumnos WHERE id_alumno='$eliminar'";
            $conexion->query($consulta);
            $conexion->close();
            header("Location: ../vista/verAlumno.php");
        }

    
?>

    