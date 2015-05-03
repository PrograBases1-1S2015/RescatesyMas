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
<link href="css/styleIndex.css" rel="stylesheet" type="text/css" media="all" />
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
                        <li class="last"><a href="indexRescatista.php"><span>Inicio</span></a></li>
                        <li><a href="registroMascotas.php"><span>Registro de Mascotas</span></a></li>
                        <li class="last"><a href="buscarAnimalesRescatista.php"><span>Buscar Animales</span></a></li>
                        <li class="last"><a href="buscarPersonasRescatista.php"><span>Buscar Personas</span></a></li>
                        <li class="last"><a href="calificar.php"><span>Calificar</span></a></li>
                        <li class="last"><a href="darAdopcion.php"><span>Dar en Adopción</span></a></li>
                        <li class="last"><a href="perfilR.php"><span>Mi perfil</span></a></li>
                    </ul>
		</div>
		<div class="clear"></div> 
	  </div>
   </div>
</div>

<div class="main">
    
<?php

$conn = oci_connect(USER, PASS, HOST);
$curs = oci_new_cursor($conn);
$stid = oci_parse($conn,"begin Cantidad_Mascotas_Registradas(:cursbv); end;" );
oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
oci_execute($stid);
oci_execute($curs); 


while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
foreach ($row as $item) {
echo "Cantidad de mascotas registradas: " . ($item !== null ? htmlentities($item, ENT_QUOTES,'ISO-8859-1') : "Nombre") . "</td>\n";
 }
}
oci_free_statement($stid);
oci_free_statement($curs);
oci_close($conn); 

$conn = oci_connect(USER, PASS, HOST);
$curs = oci_new_cursor($conn);
$stid = oci_parse($conn,"begin Cantidad_Mascotas_Adoptadas(:cursbv); end;");
oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
oci_execute($stid);
oci_execute($curs); 


while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
foreach ($row as $item) {
echo "Cantidad de mascotas adoptadas: " . ($item !== null ? htmlentities($item, ENT_QUOTES,'ISO-8859-1') : "Nombre") . "</td>\n";
 }

}
oci_free_statement($stid);
oci_free_statement($curs);
oci_close($conn);

$conn = oci_connect(USER, PASS, HOST);
$curs = oci_new_cursor($conn);
$stid= oci_parse($conn,"begin Cantidad_Mascotas_En_Adopcion(:cursbv) ; end;" );
oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
oci_execute($stid);
oci_execute($curs); 


while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){

foreach ($row as $item) {
echo "Cantidad de mascotas en adopción: " . ($item !== null ? htmlentities($item, ENT_QUOTES,'ISO-8859-1') : "Nombre") . "</td>\n";
 }

}
oci_free_statement($stid);
oci_free_statement($curs);
oci_close($conn);

?>    
    <?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//include ("settings.php");
//include ("common.php"); 




$conn = oci_connect(USER, PASS, HOST);
$curs = oci_new_cursor($conn);
$stid = oci_parse($conn, "begin Get_Todas_Mascotas(:cursbv); end;");
oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
oci_execute($stid);
oci_execute($curs);  

?>
<div class="tabla">
<table  >
    <tr><td >Nombre</td><td >Fecha</td><td >Descripción</td><td>Nota Adicional</td>
        <td >Dirección Exacta</td><td >Distrito</td><td>Estado de la mascota</td><td>Raza</td>
        <td >Tipo de Mascota</td><td >Tamanio</td><td>Rescatista</td><td>Numero de Telefono</td></tr>
<?php
    
    while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
        echo "<tr>\n";
        foreach ($row as $item) {
        echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES,'ISO-8859-1') : "Nombre") . "</td>\n";
    }
        echo "</tr>\n";
 }

oci_free_statement($stid);
oci_free_statement($curs);
oci_close($conn);

?>
 </table>
    <div>

        
         <?php
        $conn = oci_connect(USER, PASS, HOST);
        $curs = oci_new_cursor($conn);
        $stid = oci_parse($conn,"begin Top_devolucion_Mascotas(:cursbv) ; end;" );
        oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
        oci_execute($stid);
        oci_execute($curs);  
        ?>
     
        <div class="tabla">
        <table  >
            <tr><td >Causas Devolución Mascotas</td></tr> 
        <?php

            while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
                echo "<tr>\n";
                foreach ($row as $item) {
                echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES,'ISO-8859-1') : "Nombre") . "</td>\n";
            }
                echo "</tr>\n";
         }
        oci_free_statement($stid);
        oci_free_statement($curs);
        oci_close($conn);

        ?>
         </table>
         <?php
            
        $conn = oci_connect(USER, PASS, HOST);
        $curs = oci_new_cursor($conn);
        $stid = oci_parse($conn,"begin Top_Mejores_Adoptantes(:cursbv) ; end;" );
        oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
        oci_execute($stid);
        oci_execute($curs);
        
        ?>
        <div class="tabla">
        <table  >
            <tr><td >Nombre</td><td >Apellidos</td></tr> 
        <?php

            while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
                echo "<tr>\n";
                foreach ($row as $item) {
                echo "<td>" . ($item !== null ? htmlentities($item, ENT_QUOTES,'ISO-8859-1') : "Nombre") . "</td>\n";
            }
                echo "</tr>\n";
         }
        oci_free_statement($stid);
        oci_free_statement($curs);
        oci_close($conn);

        ?>
        </table>
         </div>
        </div>
        </div> 
       
</div> 	
</div>
</body>
</html>

    	
    	
            
