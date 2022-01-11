<!--generar archivo de excel sin librerias es importante poner la codificacion para que se bisualizae las tildes en elf ormato-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php
require ("bd.php");

$carNom=$_POST["carrera"];
$peri=$_POST["peri"];
$anio=$_POST["anio"];

//codigo oara generar excel
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
header("Content-Disposition: attachment; filename=$carNom-$peri-$anio.xls");

$consulta="SELECT * FROM alumnos WHERE id_alumno IN (SELECT fk_alum FROM historial where periodo = '$peri' and anio='$anio') AND carrera = '$carNom'";

?>

<caption><b><center><h2>Historial</h2><?php echo $carNom."<br>"; echo "Periodo ".$peri." del ".$anio; ?></center></b></caption><br>

<table align="center" >
    <tr>
        <td>Nombre</td>
        <td>Matricula</td>
    </tr>

<?php
//====================================================================================================================================================================
if($query=mysqli_query($conexion, $consulta)) {

    //guardamos los datos extraidos de la bd en una variable 
    while($row = $query->fetch_array()) {
        $id = $row ["id_alumno"];
        echo "<tr>";
            echo "<td style='background-color: #0FCB06;'>".$row["nombre"]."</td>";
            echo "<td style='background-color: #0FCB06;'>".$row["matricula"]."</td>";
        echo "</tr>";
        if(isset($id)){
            /*================================================*/ 
            $consulta2="SELECT * from alumnos a INNER JOIN historial h on a.id_alumno='$id' AND h.fk_alum='$id' AND  a.carrera = '$carNom' and h.periodo = '$peri' AND anio ='$anio'";
            if($query2=mysqli_query($conexion, $consulta2)) {
                while($row2 = $query2->fetch_array()) {
                echo "<tr>";
                    echo "<td>".$row2["concepto"]."</td>";
                    echo "<td>".$row2["monto"]."</td>";
                    echo "<td>".$row2["periodo"]." del ".$row2["anio"]."</td>";
                echo "</tr>";

                }
            }
            /* =======================================================*/
        }
        
    }
}
//============================================================================================
$conexion->close();

?>

</table>
</body>
</html>
