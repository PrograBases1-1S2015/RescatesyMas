<?php

include ("auth.php");
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
<link href="css/styleDirecciones.css" rel="stylesheet" type="text/css" media="all" />
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
			   <li class="active"><a href="registroDirecciones.php"><span>Direcciones</span></a></li>
			   <li><a href="registroEnfermedades.php"><span>Enfermedades</span></a></li>
			   <li class="has-sub"><a href="registroAnimales.php"><span>Animales y Razas</span></a></li>
			   <li class="last"><a href="registroPreguntas.php"><span>Preguntas y Respuesta</span></a></li>
			</ul>
		</div>
		<div class="clear"></div> 
	  </div>
   </div>
</div>

<div class="main">
 	<div class="pais">
 	 	<form id="RegPais" action="" method="post">
       		<legend>Agregar País<s></s></legend>
                        <input id="campoPais" name="nombrePais" type="text" value="Nombre del País"/>
                   		<input id="campoBoton" name="registrarPais" type="submit" value="Registrar" />
        </form>      
	</div>

	<div class="provincia">
 	 	<form id="Regprovincia" action="" method="post">
       		<legend>Agregar Provincia<s></s></legend>
                        <select id="idPais" name="nombrePais2" type="text" value="Nombre del País"/>
                        	<option value="0">Seleccione el País</option>
                        </select>
                        <input id="campoProvincia" name="nombreProvincia" type="text" value="Provincia"/>
                   		<input id="campoBoton" name="registrarProvincia" type="submit" value="Registrar" />
        </form>      
	</div>

	<div class="canton">
 	 	<form id="Regcanton" action="" method="post">
       		<legend>Agregar Cantón<s></s></legend>
                        <select id="idPais2" name="nombrePais3" type="text" value="Nombre del País"/>
                        	<option value="0">Seleccione el País</option>
                        </select>
                         <select id="idProvincia" name="nombreProvincia2" type="text" value="Nombre de la provincia"/>
                        	<option value="0">Seleccione el Provincia</option>
                        </select>	
                        <br></br>
                        <input id="campoCanton" name="nombreCanton" type="text" value="Provincia"/>
                   		<input id="campoBoton" name="registrarCanton" type="submit" value="Registrar" />
        </form>      
	</div>

	<div class="distrito">
 	 	<form id="Regdistrito" action="" method="post">
       		<legend>Agregar Distrito<s></s></legend>
                        <select id="idPais2" name="nombrePais4" type="text" value="Nombre del País"/>
                        	<option value="0">Seleccione el País</option>
                        </select>
                         <select id="idProvincia" name="nombreProvincia3" type="text" value="Nombre de la provincia"/>
                        	<option value="0">Seleccione el Provincia</option>
                        </select>
                         <select id="idCanton" name="nombreCanton2" type="text" value="Nombre del canton"/>
                        	<option value="0">Seleccione el Cantón</option>
                        </select>	
                        <br></br>
                        <input id="campoDistrito" name="nombreDistrito" type="text" value="Distrito"/>
                   		<input id="campoBoton" name="registrarDistrito" type="submit" value="Registrar" />
        </form>      
	</div>

</div>

	
</div>
</body>
</html>

    	
    	
            
