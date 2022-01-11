<?php
    
    require("bd.php");
    $eliminar=$_GET["id_his"];
    $alumno=$_GET["nombreE"];
    $id_al=$_GET["id_alE"];
   

            $consulta="DELETE FROM historial WHERE id_his='$eliminar'";
            $conexion->query($consulta);
            $conexion->close();
            header("Location: ../vista/verH.php?nombre=".$alumno."&id_alumno=".$id_al."");
    
?>