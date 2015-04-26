<?php

//include ("auth.php");
//include ("settings.php");

?>


<!--esign baytsrapndex
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free 4Pets Website Template | Home :: w3layouts</title>
<link href="css/styleIndex.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<!--slider-->
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
<!--light-box-->
<script type="text/javascript" src="js/jquery.lightbox.js"></script>
<link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen">
	<script type="text/javascript">
		$(function() {
			$('.gallery a').lightBox();
		});
   </script>    
</head>
<body>
<div class="header">
	<div class="wrap">   
	   <div class="header-top">	
	        <div class="logo">
				
			</div>
			<div class="phone">
				<span class="order">Contactenos</span><br>
				<h5 class="ph-no">88888888</h5>		
			</div>
			<div class="clear"></div> 
	    </div>
	</div>
	<div class="header-bottom">
	  <div class="wrap">	
		<div id="cssmenu">
			 <ul>
			   <li class="active"><a href="indexRescatista.php"><span>Inicio</span></a></li>
			   <li><a href="registroMascotas.php"><span>Registro de Mascotas</span></a></li>
			   <li class="has-sub"><a href="buscarAnimalesRescatista.php"><span>Buscar Animales</span></a></li>
			   <li class="last"><a href="buscarPersonasRescatista.php"><span>Buscar Personas</span></a></li>
         <li class="last"><a href="calificar.php"><span>Calificar</span></a></li>
         <li class="last"><a href="darAdopcion.php"><span>Dar en Adopción</span></a></li>
			</ul>
		</div>
		<div class="clear"></div> 
	  </div>
   </div>
</div>

<div class="main">
    <?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ("settings.php");
include ("common.php"); 


$conn = oci_connect(USER, PASS, HOST);
$curs = oci_new_cursor($conn);
$stid = oci_parse($conn, "begin Get_Todas_Mascotas(:cursbv); end;");
oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
oci_execute($stid);
oci_execute($curs);  

?>
<div class="tabla">
<table style="border:1px solid #000000;" cellspacing="0" cellpadding="0">
    <tr><td style="border:1px solid #000000;">Nombre</td><td style="border:1px solid #000000;">Fecha</td><td style="border:1px solid #000000;">Descripción</td><td>Nota Adicional</td>
        <td style="border:1px solid #000000;">Dirección Exacta</td><td style="border:1px solid #000000;">Distrito</td><td>Estado de la mascota</td><td>Raza</td>
        <td style="border:1px solid #000000;">Tipo de Mascota</td><td style="border:1px solid #000000;">Tamanio</td><td>Rescatista</td><td>Numero de Telefono</td></tr>
<?php
    
    while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
        echo "<tr>\n";
        foreach ($row as $item) {
        echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES,'ISO-8859-1') : "Nombre") . "</td>\n";
    }
        echo "</tr>\n";
 }




oci_free_statement($stid);
oci_free_statement($curs);
oci_close($conn);

?>
 </table>
</div> 	
</div>
</body>
</html>

    	
    	
            
