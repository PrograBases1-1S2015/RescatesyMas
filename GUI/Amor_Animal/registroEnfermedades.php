<?php

include ("auth.php");
//include ("settings.php");

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
<title>Free 4Pets Website Template | About :: w3layouts</title>
<link href="css/styleEnfermedades.css" rel="stylesheet" type="text/css" media="all" />
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
			   <li class="active"><a href="registroEnfermedades.php"><span>Enfermedades</span></a></li>                                   
			   <li class="has-sub"><a href="registroAnimales.php"><span>Animales y Razas</span></a></li>
			   <li class="last"><a href="registroPreguntas.php"><span>Preguntas y Respuestas</span></a></li>                  
			</ul>                                                                                     
		</div>                                                                                        
		<div class="clear"></div>                                                                     
	  </div>                                                                                          
   </div>                                                                                             
</div>                                                                                                
<div class="main">
	<div class="enfermedad">
 	 	<form id="Regenfermedad" action="" method="post">
       		<legend>Agregar Emfermedad<s></s></legend>
                        <input id="campoEnfermedad" name="nombreEnfermedad" type="text" value="Enfermedad"/>
                   		<input id="campoBoton" name="registrarEnfermedad" type="submit" value="Registrar" />
        </form>      
	</div>

	<div class="tratamiento">
 	 	<form id="RegTratamiento" action="" method="post">
       		<legend>Agregar Tratamiento<s></s></legend>
       					<select id="idEnfermedad" name="nombreEnfermedad2" type="text" value="Nombre de la enfermedad"/>
                        	<option value="0">Seleccione la Enfermedad</option>
                        </select>
                        <input id="campotratamiento" name="nombreTratamiento" type="text" value="Tratamiento"/>
                   		<input id="campoBoton" name="registrarTratamiento" type="submit" value="Registrar" />
        </form>      
	</div>

		<div class="medicamento">
 	 	<form id="Regmedicamento" action="" method="post">
       		<legend>Agregar Medicamento<s></s></legend>
                        <select id="idEnfermedad" name="nombreEnfermedad3" type="text" value="Nombre de la enfermedad"/>
                        	<option value="0">Seleccione la Enfermedad</option>
                        </select>
                         <select id="idProvincia" name="nombreTratamiento2" type="text" value="Nombre del Tratamiento"/>
                        	<option value="0">Seleccione el Tratamiento</option>
                        </select>	
                        <br></br>
                        <input id="campoMedicamento" name="nombreMedicamento" type="text" value="Medicamento"/>
                   		<input id="campoBoton" name="registrarMedicamento" type="submit" value="Registrar" />
        </form>      
	</div>



</div>
</body>
</html>

    	
    	
            