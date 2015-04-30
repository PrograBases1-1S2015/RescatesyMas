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
    <form id="busquedaMascota" action="buscarPersonasAdoptante.php" method="post">
                        <input id="campoFormulario" name="nombre" type="text" value="Nombre"/>
                        <input id="campoFormulario" name="apellido" type="text" value="Apellido"/>
                        <input id="campoFormulario" name="e-mail" type="text" value="E-Mail"/>
                        <input id="campoFormulario" name="usuario" type="text" value="Usuario"/>
                        <table> 
                        <tr>
                         <td width="500">
                             <label for="rescatista" style="width: 200px; display: block; float: left;" >Rescatista:</label>
                             <input type="radio" name="tipoPersona" id="rescatista" value="rescatista" />
                         </td>
                       </tr>
                       <tr><td>&nbsp; </td></tr>
                       <tr>
                         <td width="500">
                             <label for="adoptante" style="width: 200px; display: block; float: left;" >Adoptante:</label>
                             <input type="radio" name="tipoPersona" id="adoptante" value="adoptante" checked  />
                         </td>
                       </tr>
                       <tr><td>&nbsp; </td></tr>
                     </table>  
                     <input type="submit" name='buscar' value="Buscar" />
                   		
                   	
        </form> 
            <section id="resultados"> 
             <?php 
                $x="Nombre";
                   if (isset($_POST['buscar'])){
                       if ( $x == $_POST['nombre']){
                            $nombre = $_POST['nombre'];
                                
                            
                       }else{
                           $nombre='';
                       }
                       
      
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $tipoPersona = $_POST['tipoPersona'];
                    $email = $_POST['e-mail'];
                    $usuario = $_POST['usuario'];
                    
                    if ($tipoPersona == 'rescatista'){
                   
                    $conn = oci_connect(USER, PASS, HOST);
                    $curs = oci_new_cursor($conn);
                    $stid = oci_parse($conn, "begin Busqueda_Rescatista('$nombre','$apellido','$tipoPersona','$email','$usuario',:cursbv); end;");
                    oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
                    $a=oci_execute($stid);
                    $b=oci_execute($curs);
                    
                    if ($a == true){
                       ?>
                      <table style="border:1px solid #000000;" cellspacing="0" cellpadding="0">
                      <tr><td style="border:1px solid #000000;">Nombre</td><td style="border:1px solid #000000;">Apellidos</td><td style="border:1px solid #000000;">Correo</td><td style="border:1px solid #000000;">Estado en Lista Negra</td><td style="border:1px solid #000000;">Número de teléfono</td><td
                              style="border:1px solid #000000;">Usuario</td></tr> 
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

                  }
                }
                
                else{
                        $conn = oci_connect(USER, PASS, HOST);
                        $curs = oci_new_cursor($conn);
                        $stid = oci_parse($conn, "begin Busqueda_Adoptante('$nombre','$apellido','$tipoPersona','$email','$usuario',:cursbv); end;");
                        oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
                        $a=oci_execute($stid);
                        $b=oci_execute($curs);

                        if ($a == true){
                           ?>
                          <table style="border:1px solid #000000;" cellspacing="0" cellpadding="0">
                          <tr><td style="border:1px solid #000000;">Nombre</td><td style="border:1px solid #000000;">Apellidos</td><td style="border:1px solid #000000;">Correo</td><td>Estado en Lista Negra</td>
                         <td style="border:1px solid #000000;">Número de teléfono</td><td>Usuario</td></tr> 
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

                      }  

                    }
                    }
                     ?>

         </table>   
             
         </section>     
            
            
          
    
    
    
    
    
    
    
	</div>

</div>
</body>
</html>

    	
    	
            