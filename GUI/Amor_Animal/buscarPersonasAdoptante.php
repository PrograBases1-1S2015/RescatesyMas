<?php

include ("auth.php");
//include ("settings.php");
$nom_Usuario = $_COOKIE['id'];
$existeFoto = FALSE;

$Conn = oci_connect(USER, PASS, HOST);

$sql_1 = "SELECT PERSONA.FOTO, nvl2(dbms_lob.GETLENGTH(PERSONA.FOTO),1,0) AS EXISTEFOTO
          FROM PERSONA INNER JOIN USUARIO 
          ON PERSONA.USUARIO_ID = USUARIO.USUARIO_ID
          WHERE USUARIO.NOM_USUARIO = '$nom_Usuario'";
$sql_1 = OCIParse($Conn, $sql_1);
OCIExecute($sql_1, OCI_DEFAULT);
While (OCIFetchInto($sql_1, $row, OCI_ASSOC))
{
    if($row['EXISTEFOTO'] == 1)
    {
        $existeFoto = TRUE;
    }
}
OCIFreeStatement($sql_1);
OCILogoff($Conn);
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
                            <?php
                                if(!$existeFoto)
                                {
                                    echo '

                                        <form action="InsertarImagenPerfil.php" method="post" enctype="multipart/form-data">
                                        Seleccione una imagen de perfil: <br/><br/> <input type="file" name="foto_Perfil"><br><br>
                                        <input type="submit" value="Subir Imagen">
                                        </form>';
                                }
                                else
                                {
                                   echo '<img src="cargarImagenPerfil.php"  width="100" />';
                                }
                            ?>
			</div>                                                                                    
			<div class="clear"></div>                                                                 
	    </div>                                                                                        
	</div>                                                                                            
	<div class="header-bottom">                                                                       
	  <div class="wrap">	                                                                          
		<div id="cssmenu">                                                                            
			 <ul>                                                                                     
			   <li><a href="indexAdoptante.php"><span>Inicio</span></a></li>
			   <li class="has-sub"><a href="buscarAnimalesAdoptante.php"><span>Buscar Animales</span></a></li>
			   <li class="active"><a href="buscarPersonasAdoptante.php"><span>Buscar Personas</span></a></li>
         	   <li class="last"><a href="test.php"><span>Test</span></a></li>
         	   <li class="last"><a href="devolucion.php"><span>Devolver MAscota</span></a></li>
			</ul>                                                                                     
		</div>                                                                                        
		<div class="clear"></div>                                                                     
	  </div>                                                                                          
   </div>                                                                                             
</div>                                                                                                
<div class="main">
	
<div class="busqueda">
 	 	<form id="busquedaMascota" action="" method="post">
 	 				<label>Nombre:</label>
                        <input id="campoFormulario" name="nombre" type="text" value="Nombre"/>
                    <label>Apellido:</label>
                        <input id="campoFormulario" name="apellido" type="text" value="Apellido"/>
                    <label>Tipo Persona:</label>
                        <input id="campoFormulario" name="tipoPersona" type="text" value="Tipo Persona"/>
                    <label>E-Mail:</label>
                        <input id="campoFormulario" name="e-mail" type="text" value="E-Mail"/>
                    <label>Distrito:</label>
                        <input id="campoFormulario" name="distrito" type="text" value="Distrito"/>
                    <label>Cédula:</label>
                        <input id="campoFormulario" name="cedula" type="number" value="Cédula"/>
                    <input id="campoBoton" name="buscar" type="submit" value="Buscar" />
                   		
                   	
        </form>      
	</div>

</div>
</body>
</html>

    	
    	
            