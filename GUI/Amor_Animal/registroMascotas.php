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
<link href="css/styleIndex.css" rel="stylesheet" type="text/css" media="all" />
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
			    <li><a href="indexRescatista.php"><span>Inicio</span></a></li>
			   <li class="active"><a href="registroMascotas.php"><span>Registro de Mascotas</span></a></li>
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
		<form action="" method="post" >
            <legend>Formulario de Registro</legend>
                <table style="float: left;" >
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Nombre:</label>
                        <input id="campo1" name="nombre" type="text" style="width: 200px; display: block; float: left;" />
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                    	 <label style="width: 200px; display: block; float: left;" >Severidad:</label>
                       <select name='severidad' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione la Severidad</option>
                       </select>

                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                         <label style="width: 200px; display: block; float: left;" >Estado de la Mascota:</label>
                       			<select name='estadoMascota' style="width: 200px; display: block; float: left;">
                            		<option value="0">Seleccione el Estado de la Mascota</option>
                       </select>
                    </td>
                  </tr>
                   <tr><td>&nbsp; </td></tr>
                    <td width="500">
                        	 <label style="width: 200px; display: block; float: left;" >Enfermedad:</label>
                       			<select name='enfermedad' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione la Enfermedad</option>
                       			</select>

                    </td>
                  <tr>
				   <tr><td>&nbsp; </td></tr>
                    <td width="500">
                        	 <label style="width: 200px; display: block; float: left;" >Tamaño:</label>
                       			<select name='tamaño' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione el tamaño</option>
                       			</select>
                    </td>
                  	<tr>
					<tr><td>&nbsp; </td></tr>
                    <td width="500">
                        	 <label style="width: 200px; display: block; float: left;" >Color:</label>
                       			<select name='color' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione el color</option>
                       			</select>
                    </td>
                  	<tr>
					<tr><td>&nbsp; </td></tr>
                    <td width="500">
                        	 <label style="width: 200px; display: block; float: left;" >Nivel de Engergía:</label>
                       			<select name='nivel_energia' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione el nivel</option>
                       			</select>
                    </td>
                  	<tr>
					<tr><td>&nbsp; </td></tr>
                    <td width="500">
                        	 <label style="width: 200px; display: block; float: left;" >Facilidad de Entrenamiento:</label>
                       			<select name='facilidad_entrenamiento' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione la facilidad</option>
                       			</select>
                    </td>
                  	<tr>

   					<tr><td>&nbsp; </td></tr>
                    <td width="500">
                        <label for="rescatista" style="width: 200px; display: block; float: left;" >Requiere Espacio:</label>
                        <input type="radio" name="tipoPersona" id="rescatista" value="Rescatista" />
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label for="adoptante" style="width: 200px; display: block; float: left;" >No requiere espacio:</label>
                        <input type="radio" name="tipoPersona" id="adoptante" value="Adoptante" checked  />
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                </table>

                <table style="float: left;">
				<tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Tipo de Mascota:</label>
                       <select name='provincia' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione el Tipo de Mascota</option>
                       </select>
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                 <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Canton:</label>
                       <select name='canton' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione el cantón</option>
                       </select>
                    </td>
                  </tr>
				<tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Descripción del rescate:</label>
                        <textarea COLS=15 ROWS=3 NAME='descripcion'>
                        </Textarea>                    
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Nota Adicional:</label>
                        <textarea COLS=15 ROWS=3 NAME='nota'>
                        </Textarea>                    
                    </td>
                  </tr>
                  </table>
                  <table style="float: left;" >
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >País:</label>
                       <select name='pais' onChange="cargarProvincias(this.value);" style="width: 200px; display: block; float: left;">
                        <option value="0">Seleccione el pais</option>
                        <option ><?php echo $opciones; ?></option>
                       </select>
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Provincia:</label>
                       <select name='provincia' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione la provincia</option>
                       </select>
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Canton:</label>
                       <select name='canton' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione el cantón</option>
                       </select>
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Distrito:</label>
                       <select name='distrito' style="width: 200px; display: block; float: left;">
                            <option value="0">SElecciones el distrito</option>
                       </select>
                    </td>
                  </tr>
                <tr>
                 <tr><td>&nbsp; </td></tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Dirección Exacta:</label>
                        <textarea COLS=20 ROWS=5 NAME='direccionExacta'>
                        </Textarea> 
                    </td>
                  </tr>


                </table>
                <div style="clear: both;"></div>
                
                <input id="campo10" name="enviar" type="submit" value="Enviar" />                
                
	</form>
	  
	</div>

</div>
</body>
</html>

    	
    	
            