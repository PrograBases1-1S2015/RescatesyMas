

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

function cargar_paises(){
  $conn = oci_connect(USER, PASS, HOST);
  $curs = oci_new_cursor($conn);
  $stid = oci_parse($conn, "begin Get_Paises(:cursbv); end;");
  oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
  oci_execute($stid);
  oci_execute($curs);   
                               while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                                    echo '<option value="'.$row["PAIS_ID"].'">'.$row["PAIS"].'</option>';
                                }

                                oci_free_statement($stid);
                                oci_free_statement($curs);
                                oci_close($conn);
  


}


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
            <form id="RegPais" action="Administrador_Registros.php" method="post">
       		<legend>Agregar País<s></s></legend>
                        <input id="campoPais" name="nombrePais" type="text" value="Nombre del País"/>
                   		<input id="campoBoton" name="registrarPais" type="submit" value="Registrar" />
        </form>      
	</div>

	<div class="provincia">
            <form id="Regprovincia" action="Administrador_Registros.php" method="post">
       		<legend>Agregar Provincia<s></s></legend>
                <select  name="nombrePais2"  />
                    
                
                            <option >Seleccione el País</option>
                                <?php 
                                   cargar_paises();
                            ?>
                        </select>
                        <input id="campoProvincia" name="nombreProvincia" type="text" value="Provincia"/>
                   		<input id="campoBoton" name="registrarProvincia" type="submit" value="Registrar" />
        </form>      
	</div>

	<div class="canton">
            <form id="Regcanton" action="Administrador_Registros.php" method="post">
       		<legend>Agregar Cantón<s></s></legend>
                <select name="nombrePais3" onChange="getProvincia(this.value);"/>
                        	<option >Seleccione el País</option>
                           <?php
                               cargar_paises();    
                            ?>
                                
                        </select>
                         <select id="com_Provincia" name="nombreProvincia2"/>
                        	<option >Seleccione la Provincia</option>
                        </select>	
                        <br></br>
                        <input id="campoCanton" name="nombreCanton" type="text" value="Cantón"/>
                   		<input id="campoBoton" name="registrarCanton" type="submit" value="Registrar" />
        </form>      
	</div>

	<div class="distrito">
            <form id="Regdistrito" action="Administrador_Registros.php" method="post">
       		<legend>Agregar Distrito<s></s></legend>
                <select  name="nombrePais4" onChange="getProvincia1(this.value);"/>
                        	<option >Seleccione el País</option>
                                 <?php
                               cargar_paises();     
                            ?>
                        </select>
                <select id="com_Provincia1" name="nombreProvincia3" onchange="getCanton(this.value);"/>
                        	<option >Seleccione el Provincia</option>
                        </select>
                         <select id="com_Canton" name="nombreCanton2" type="text" value="Nombre del canton"/>
                        	<option value="0">Seleccione el Cantón</option>
                        </select>	
                        <br></br>
                        <input id="campoDistrito" name="nombreDistrito" type="text" value="Distrito"/>
                   		<input id="campoBoton" name="registrarDistrito" type="submit" value="Registrar" />
        </form>      
	</div>

</div>

	
</div>
    <!-- Validaciones -->
    <script src="js/misFunciones.js"></script>
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>



    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script> 
</body>
</html>

    	
    	
            
