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
<title>Free 4Pets Website Template | Services :: w3layouts</title>
<link href="css/styleIndexAdop.css" rel="stylesheet" type="text/css" media="all" />
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
			   <li><a href="indexAdoptante.php"><span>Inicio</span></a></li>
			   <li><a href="buscarAnimalesAdoptante.php"><span>Buscar Animales</span></a></li>
			   <li><a href="buscarPersonasAdoptante.php"><span>Buscar Personas</span></a></li>
         	   <li><a href="test.php"><span>Test</span></a></li>
         	   <li class="active"><a href="devolucion.php"><span>Devolver MAscota</span></a></li>
			</ul>                                                                                     
		</div>                                                                                        
		<div class="clear"></div>                                                                     
	  </div>                                                                                          
   </div>                                                                                             
</div>                                                                                                
<div class="main">
	<div class="busqueda">
		<form action="" method="post" >
            <legend>Devolución</legend>
            
                <label>Mascota:</label>
                       			<select name='mascota'>
                            <option value="0">Seleccione la Mascota</option>
                       			</select>
                <label>Causa:</label>
                       			<select name='causa'>
                            <option value="0">Seleccione la Causa</option>
                       			</select>
                <input id="campoBoton" name="devolver" type="submit" value="devolver" />
                
	</form>
	  
	</div>

</div>
</body>
</html>

    	
    	
            