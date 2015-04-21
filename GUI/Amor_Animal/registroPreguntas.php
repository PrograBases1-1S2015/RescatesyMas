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
<title>Free 4Pets Website Template | Contact :: w3layouts</title>
<link href="css/stylePreguntas.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'> 
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>  
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
			   <li><a href="registroAnimales.php"><span>Animales y Razas</span></a></li>
			   <li class="active"><a href="registroPreguntas.php"><span>Preguntas y Respuestas</span></a></li>                  
			</ul>                                                                                     
		</div>                                                                                        
		<div class="clear"></div>                                                                     
	  </div>                                                                                          
   </div>                                                                                             
</div>                                                                                                
 <div class="main">
 	<div class="pregunta">
 	 	<form id="Regpregunta" action="" method="post">
       		<legend>Agregar Pregunta<s></s></legend>
                        <input id="campoPregunta" name="nombrePregunta" type="text" value="Pregunta"/>
                   		<input id="campoBoton" name="registrarPregunta" type="submit" value="Registrar" />
        </form>      
	</div>

	<div class="respuesta">
 	 	<form id="Regrespuesta" action="" method="post">
       		<legend>Agregar Respuesta<s></s></legend>
       					<select id="idPregunta" name="nombrePregunta2" type="text" value="Nombre de la Pregunta"/>
                        	<option value="0">Seleccione la Pregunta</option>
                        </select>
                        <input id="camporespuesta" name="nombreRespuesta" type="text" value="Respuesta"/>
                   		<input id="campoBoton" name="registrarRespuesta" type="submit" value="Registrar" />
        </form>      
	</div>


	<div class="formulario">
 	 	<form id="Regpregunta" action="" method="post">
       		<legend>Agregar Formulario<s></s></legend>
                        <input id="campoFormulario" name="nombreFormulario" type="text" value="Formulario"/>
                   		<input id="campoBoton" name="registrarFormulario" type="submit" value="Registrar" />
        </form>      
	</div>

		<div class="preguntaxformulario">
 	 	<form id="Regpxf" action="" method="post">
       		<legend>Agregar Preguntas al Formulario<s></s></legend>
                        <select id="idPregunta" name="nombrePregunta3" type="text" value="Nombre de la enfermedad"/>
                        	<option value="0">Seleccione la Pregunta</option>
                        </select>
                         <select id="idFormulario" name="nombreFormulario2" type="text" value="Nombre del Tratamiento"/>
                        	<option value="0">Seleccione el Formulario</option>
                        </select>	
                        <br></br>
                   		<input id="campoBoton" name="registrarPregxForm" type="submit" value="Registrar" />
        </form>      
	</div>


 </div>
</body>
</html>

    	
    	
            