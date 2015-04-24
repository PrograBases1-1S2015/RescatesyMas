<?php

include ("settings.php");
include ("common.php");
function cargar_mascotas(){ 
$conn = oci_connect(USER, PASS, HOST);
  $curs = oci_new_cursor($conn);
  $stid = oci_parse($conn, "begin Get_Tipo_Mascota(:cursbv); end;");
  oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
  oci_execute($stid);
  oci_execute($curs);  
        while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            echo '<option value="'.$row["TIPO_MASCOTA_ID"].'">'.$row["TIPO_MASCOTA"].'</option>';
              }

    oci_free_statement($stid);
    oci_free_statement($curs);
    oci_close($conn);
                                
}      
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free 4Pets Website Template | Services :: w3layouts</title>
<link href="css/styleAnimales.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'> 
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>  
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
				<a href="index.php"><img src="images/logo.png" alt=""/></a>                                             
			</div>                                                                                    
			<div class="phone">                                                                       
				<span class="order">order online:</span><br>                                          
				<h5 class="ph-no">+1 800 253 2560</h5>		                                          
			</div>                                                                                    
			<div class="clear"></div>                                                                 
	    </div>                                                                                        
	</div>                                                                                            
	<div class="header-bottom">                                                                       
	  <div class="wrap">	                                                                          
		<div id="cssmenu">                                                                            
			 <ul>                                                                                     
			   <li><a href="registroDirecciones.php"><span>Direcciones</span></a></li>                     
			   <li><a href="registroEnfermedades.php"><span>Enfermedades</span></a></li>                                   
			   <li class="active"><a href="registroAnimales.php"><span>Animales y Razas</span></a></li>
			   <li class="last"><a href="registroPreguntas.php"><span>Preguntas y Respuestas</span></a></li> 
			</ul>                                                                                     
		</div>                                                                                        
		<div class="clear"></div>                                                                     
	  </div>                                                                                          
   </div>                                                                                             
</div>                                                                                                
<div class="main">
	<div class="animal">
            <form id="Reganimal" action="Administrador_Registros.php" method="post">
       		<legend>Agregar Animal/Tipo Mascota<s></s></legend>
                        <input id="campoAnimal" name="nombreAnimal" type="text" value="Animal/Tipo Mascota"/>
                   		<input id="campoBoton" name="registrarAnimal" type="submit" value="Registrar" />
        </form>      
	</div>

	<div class="raza">
            <form id="Regraza" action="Administrador_Registros.php" method="post">
       		<legend>Agregar Raza<s></s></legend>
       					<select  name="nombreAnimal2" />
                        	<option>Seleccione el Animal</option>
                                <?php
                                cargar_mascotas();
                                ?>
                        </select>
                        <input id="camporaza" name="nombreRaza" type="text" value="Raza"/>
                   		<input id="campoBoton" name="registrarRaza" type="submit" value="Registrar" />
        </form>      
	</div>

</div>
</body>
</html>

    	
    	
            