<?php
error_reporting(0);
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

function cargar_preguntas(){ 
$conn = oci_connect(USER, PASS, HOST);
  $curs = oci_new_cursor($conn);
  $stid = oci_parse($conn, "begin Get_Pregunta(:cursbv); end;");
  oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
  oci_execute($stid);
  oci_execute($curs);  
        while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            echo '<option value="'.$row["PREGUNTA_ID"].'">'.$row["PREGUNTA"].'</option>';
              }

    oci_free_statement($stid);
    oci_free_statement($curs);
    oci_close($conn);
                                
} 

function cargar_formularios(){ 
$conn = oci_connect(USER, PASS, HOST);
  $curs = oci_new_cursor($conn);
  $stid = oci_parse($conn, "begin Get_Formulario(:cursbv); end;");
  oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
  oci_execute($stid);
  oci_execute($curs);  
        while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
            echo '<option value="'.$row["TIPO_FORMULARIO_ID"].'">'.$row["TIPO_FORMULARIO"].'</option>';
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
				<img src="images/logo.png" alt=""/>                                            
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
            <form id="Regpregunta" action="Administrador_Registros.php" method="post">
       		<legend>Agregar Pregunta<s></s></legend>
                        <input id="campoPregunta" name="nombrePregunta" type="text" value="Pregunta"/>
                   		<input id="campoBoton" name="registrarPregunta" type="submit" value="Registrar" />
        </form>      
	</div>

	<div class="respuesta">
            <form id="Regrespuesta" action="Administrador_Registros.php" method="post">
       		<legend>Agregar Respuesta<s></s></legend>
       					<select name="nombrePregunta2" />
                        	<option>Seleccione la Pregunta</option>
                                <?php
                                cargar_preguntas();
                                ?>
                        </select>
                        <input id="camporespuesta" name="nombreRespuesta" type="text" value="Respuesta"/>
                   		<input id="campoBoton" name="registrarRespuesta" type="submit" value="Registrar" />
        </form>      
	</div>


	<div class="formulario">
            <form id="Regpregunta" action="Administrador_Registros.php" method="post">
       		<legend>Agregar Formulario<s></s></legend>
                        <input id="campoFormulario" name="nombreFormulario" type="text" value="Formulario"/>
                   		<input id="campoBoton" name="registrarFormulario" type="submit" value="Registrar" />
        </form>      
	</div>

		<div class="preguntaxformulario">
                    <form id="Regpxf" action="Administrador_Registros.php" method="post">
       		<legend>Agregar Preguntas al Formulario<s></s></legend>
                        <select  name="nombrePregunta3" />
                        	<option>Seleccione la Pregunta</option>
                                <?php
                                cargar_preguntas();
                                ?>
                        </select>
                         <select  name="nombreFormulario2" />
                         <option> Seleccione el Formulario</option>
                                 <?php
                                    cargar_formularios();
                                ?>
                        </select>	
                        <br></br>
                   		<input id="campoBoton" name="registrarPregxForm" type="submit" value="Registrar" />
        </form>      
	</div>


 </div>
</body>
</html>

    	
    	
            