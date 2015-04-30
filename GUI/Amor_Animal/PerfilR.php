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


    




function cargar(){
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
<link href="css/styleIndexAdop.css" rel="stylesheet" type="text/css" media="all" />
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
			   <li class="last"><a href="indexAdoptante.php"><span>Inicio</span></a></li>
			   <li class="has-sub"><a href="buscarAnimalesAdoptante.php"><span>Buscar Animales</span></a></li>
			   <li class="last"><a href="buscarPersonasAdoptante.php"><span>Buscar Personas</span></a></li>
         	   <li class="last"><a href="test.php"><span>Test</span></a></li>
         	   <li class="last"><a href="devolucion.php"><span>Devolver MAscota</span></a></li>
                   <li class="active"><a href="perfilA.php"><span>Mi perfil</span></a></li>
			</ul>
		</div>
		<div class="clear"></div> 
	  </div>
   </div>
</div>

    <div class="main">
        <?php
         $con = oci_connect(USER, PASS, HOST);
   $cur = oci_new_cursor($con);
   $sti = oci_parse($con, "begin Obtener_Datos('$nom_Usuario',:cursbv); end;");
   oci_bind_by_name($sti, ":cursbv", $cur, -1, OCI_B_CURSOR);
   $ok= oci_execute($sti);
   oci_execute($cur);  
     
    
 if ($ok == true){
		
// agarramos los datos q fueron devueltos en el cursor
		 while ($entry = oci_fetch_array($cur, OCI_RETURN_LOBS + OCI_RETURN_NULLS)){

                     $nombre=$entry['NOMBRE'];
                     $apellidos=$entry['APELLIDOS'];
                     $contraseña=$entry['CONTRASENIA'];
                     $cedula=$entry['CEDULA'];
                     $correo=$entry['EMAIL'];
                     $direccionExacta=$entry['DIRECCION_EXACTA'];
                     $telefono=$entry['NUM_TELEFONO_1'];
                     $distrito=$entry['DISTRITO'];
                     $canton=$entry['CANTON'];
                     $provincia=$entry['PROVINCIA'];
                     $pais=$entry['PAIS'];
                             

                 }
 }
        ?>
        
 <form action="actualizar.php" method="post" >
            <legend>DATOS PERSONALES</legend>
            <legend>Para cambiar algún dato. Reemplace los datos y dele al botón de actualizar</legend>
                <table style="float: left;" >
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Nombre:</label>
                        <input id="campo1" value= "<?php echo $nombre; ?>"  name="nombre" type="text" style="width: 200px; display: block; float: left;" />
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Apellidos:</label>
                        <input id="campo2" name="apellidos" value= "<?php echo $apellidos; ?>" type="text" style="width: 200px; display: block; float: left;" />
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>

           

                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Email:</label>
                        <input id="campo4" name="email" value= "<?php echo $correo; ?>" type="text" onchange="verificarCorreo(this.value)" style="width: 200px; display: block; float: left;" />
                    </td>
                  </tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >&nbsp;</label>
                        <label style="width: 200px; display: block; float: left;" >ejemplo: 123456789</label>
                    </td>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >CÃ©dula:</label>
                        <input id="campo5"  disabled="disabled"  name="cedula" type="text" value= "<?php echo $cedula; ?>" onkeypress="return justNumbers(event);" onchange="verificarCedula(this.value)" style="width: 200px; display: block; float: left;" />
                    </td>
                  </tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >&nbsp;</label>
                        <label style="width: 200px; display: block; float: left;" >ejemplo: 22446688</label>
                    </td>
                  </tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >TelÃ©fono:</label>
                        <input id="campo7" name="telefono" type="text" value= "<?php echo $telefono; ?>" onkeypress="return justNumbers(event);"  style="width: 200px; display: block; float: left;" />
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    
                    
                </table>

                <table style="float: left;">
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Nombre Usuario:</label>
                        <input id="campo8"  disabled="disabled"  value= " <?php echo $nom_Usuario; ?>" name="nomUsuario" type="text" onchange="verificarUsuario(this.value)" style="width: 200px; display: block; float: left;" />
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >ContraseÃ±a:</label>
                        <input id="campo9" name="contrasenia" value= "<?php echo $contraseña; ?>" style="width: 200px; display: block; float: left;" />
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
   
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                 
                  </tr>
                <tr>
                 <tr><td>&nbsp; </td></tr>
                         <td width="500">
                        <label style="width: 200px; display: block; float: left;" >PaÃ­s:</label>
                       <select name='pais' onChange="getProvincia(this.value);" style="width: 200px; display: block; float: left;">
                        <option>Seleccione el pais</option>
                            <?php 
                             cargar();
                            ?>
                        
                       </select>
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Provincia:</label>
                       <select id= 'com_Provincia' name='provincia' onChange="getCanton(this.value);" style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione la provincia</option>
                       </select>
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Canton:</label>
                       <select id="com_Canton" name='canton' onChange="getDistrito(this.value);" style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione el cantÃ³n</option>
                       </select>
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Distrito:</label>
                       <select focus=3 id="com_Distrito" name="distrito" style="width: 200px; display: block; float: left;">
                            <option value="0">Selecciones el distrito</option>
                            
                       </select>
                    </td>
                  </tr>  
                 
                 
                 
                 <td width="500">
                        <label style="width: 200px; display: block; float: left;" >DirecciÃ³n Exacta:</label>
                        <textarea COLS=20 ROWS=5  NAME="direccionExacta"> <?php echo "$direccionExacta,$distrito,$canton,$provincia,$pais" ?>
                        </Textarea> 
                      
                    </td>
                  </tr>
                  


                </table>
                <div style="clear: both;"></div>
                
                <input id="campo10" name="enviar" type="submit" value="Actualizar datos" />                
                
	</form>
        
        <?php
             oci_free_statement($sti);
                                oci_free_statement($cur);
                                oci_close($con);
        ?>
        
        
        
      
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

    	
    	
            
