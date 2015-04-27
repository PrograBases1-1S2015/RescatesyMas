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

    	
    	
            