<?php
  require('bd.php');
  require_once('../lib/TCPDF/tcpdf_import.php');
  //RECOLECCION DE DATOS
  $Alumno = $_POST["Alumno"];
  $cuatrimestre = $_POST["cuatrimestre"];
  $periodo2 = $_POST["periodo2"];
  $tCons = $_POST["tCons"];
  $promedio = $_POST["promedio"];
  //CONSULTA DE DATOS
  $consulta = "SELECT * FROM alumnos WHERE matricula='$Alumno'";
  if($resultado = $conexion->query($consulta)) {
    //guardamos los datos extraidos de la bd en una variable 
    while($row = $resultado->fetch_array()) {
      $nombre = $row["nombre"];  
      $matricula = $row["matricula"];
      $carrera=$row["carrera"];
    }
  }
//---------------------------------------
  if(mysqli_num_rows($resultado)==1){
    $resultado->close();
    require('convercion.php');
    require('tcons.php');
    //---------------------------------------
    //nuevo documento en blanco
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'UTF-8', false);
    // remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    // set margins
    $pdf->SetMargins("30", "25", "30");
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
      $pdf->setLanguageArray($l);
    }
    ////--------------impresiones
    // set font
    $pdf->SetFont('arial', 'I', 12);
    // add a page
    $pdf->AddPage();
    $pdf->Image('../img/cabeza.jpg', 0, 0, 200, 33,'', '', '', false, 300, '', false, false, 0);
    $pdf->Image('../img/cuarpo.jpg', 0, 53, 0, 190,'', '', '', false, 300, '', false, false, 0);
    // set some text to print
    $pdf->SetFont('arial', 'I', 11);
    $html = '<span style="text-align:center;"><br>2021, Año de la independencia</span>';
    // output the HTML content
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    //_-------------------------------------------------------------------------

    $pdf->SetFont('arial', 'B', 11);
    $html = '<span style="text-align:left;"><br><br><br>A QUIEN CORRESPONDA <br><br>PRESENTE<br><br></span>';
    // output the HTML content
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');  
    //_-------------------------------------------------------------------------
    $pdf->SetFont('arial', '', 11);
    $html = '<span style="text-align:justify; line-height:150%; ">El que suscribe Mtro. <b>Adán Cano García</b> Subdirector de la Unidad Académica Selva Negra 
    con clave 07EUT0002N</span>';
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    //--=======================================
    $pdf->SetFont('arial', 'U', 12);
    $html = '<span style="text-align:center;"><br><br>H A C E C O N S T A R<br><br></span>';
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    //---==========================================
    
    if($tCons==5){
      $pdf->SetFont('arial', '', 11);
      $html = '<span style="text-align:justify; line-height:150%;">Que según documentos que obran en el archivo de esta institución, el (la) C. <b>'.$nombre.'</b> con matrícula <b>'.$matricula.'</b>, cursó satisfactoriamente los planes y programas de estudio de la Carrera
      de <b>'.$carrera.'</b>, durante el periodo '.$periodo2.'. Así mismo me permito hacer de su conocimiento que el único medio de Titulación es la Memoria de Estadía.
      <br><br>Cabe hacer mención que actualmente se encuentra en proceso el trámite de su Título y Cédula profesional.</span>
      <br><br>A petición de la parte interesada, y para los fines legales que tenga lugar, se extiende la presente en Rayón, Chiapas; al día uno del mes de marzo del dos mil veintiuno.';
      // output the HTML content
      $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    }else{
      $pdf->SetFont('arial', '', 11);
      $html = '<span style="text-align:justify; line-height:150%;">Que el (la) alumno (a) <B>'.$nombre.'</B> con matricula <B>'.$matricula.'</B>, se
      encuentra inscrito (a) en el <B>'.$cuatrimestre.'</B> cuatrimestre  de la Carrera de <B>'.$carrera.'</B> correspondiente al periodo del <b>'.$periodo2.'</b>. '.$tCons.'<BR><BR><BR>A 
      peticion de la parte interesada, y para los fines legales que tenga lugar, se extiende la presente en Rayón, Chiapas; a los '.$fecha.' dias del mes de '.$fecha2.' del '.$fecha3.'.</span>';
      // output the HTML content
      $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
      }
      //--==========================================
      $pdf->SetFont('arial', 'B', 12);
      $html = '<span style="text-align:center;"><br><br><br><br>A t e n t a m e n t e<</span>';
      $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
      //---==========================================
      $pdf->SetFont('arial', 'BI', 8);
      $html = '<span style="text-align:center;"><br>"La causa de la educación tecnológica es una,<br>
      con el desarrollo sustentable"<br><</span>';
      $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
      //---==========================================

      $pdf->SetFont('arial', 'BI', 10);
      $html = '<span style="text-align:center;"><br><br>Mtro. Adan Cano Garcia <br>Subdirector<br><</span>';
      $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
      //---==========================================
    $pdf->Image('../img/pie.jpg', 0, 246, 200, 22,'', '', '', false, 300, '', false, false, 0, false, false, false);
    //$html = "<img src='../img/pie.jpg' />";
    //$pdf->writeHTML($html, true, 0, true, 0);
    $pdf->Output($nombre.".pdf");
    //-----------------------------------
  }else{
    $error="El alumno no exite";
    Header("Location: ../vista/home.php?error=".$error."");
  }
?>