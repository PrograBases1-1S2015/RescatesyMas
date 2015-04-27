<?php

include ("auth.php");
//include ("settings.php");
$nom_Usuario = $_COOKIE['id'];
$idRescatista;
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
//////////////////////////////////////////////////////////////////////////////////
$Conn = oci_connect(USER, PASS, HOST);

$sql_1 = "SELECT RESCATISTA_ID
          FROM RESCATISTA INNER JOIN PERSONA ON RESCATISTA.PERSONA_ID = PERSONA.PERSONA_ID
          INNER JOIN USUARIO ON PERSONA.USUARIO_ID = USUARIO.USUARIO_ID
          WHERE USUARIO.NOM_USUARIO = '$nom_Usuario'";
$sql_1 = OCIParse($Conn, $sql_1);
OCIExecute($sql_1, OCI_DEFAULT);
While (OCIFetchInto($sql_1, $row, OCI_ASSOC))
{
    $idRescatista = $row['RESCATISTA_ID'];
}
OCIFreeStatement($sql_1);
OCILogoff($Conn);





if (isset($_POST['calificar']))
{
    $calificacion = $_POST['estrellas'];
    $comentario = 'Calificación';
    $idAdoptante = $_POST['Adoptante'];
    $conn = oci_connect(USER, PASS, HOST);
    $stmt = oci_parse($conn, "begin Calificar_Persona('$calificacion' , '$comentario' ,'$idAdoptante' , '$idRescatista'); end;");
    oci_execute($stmt); 
    oci_close($conn);
    echo "<script>alert(\"Su Calificación se ha guardado con exito.\");</script>";
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
   
<style>

form{ width:250px; margin:0 auto; padding:10px; }
form p, form input[type = "submit"]{text-align:left; font-size:30px;}


input[type = "radio"]{ display:none;/*position: absolute;top: -1000em;*/}
label{ color:grey;}

.clasificacion{
    direction: rtl;
    unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label{color:orange;}
input[type = "radio"]:checked ~ label{color:orange;}

</style>    
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
			    <li><a href="indexRescatista.php"><span>Inicio</span></a></li>
			   <li><a href="registroMascotas.php"><span>Registro de Mascotas</span></a></li>
			   <li class="has-sub"><a href="buscarAnimalesRescatista.php"><span>Buscar Animales</span></a></li>
			   <li class="last"><a href="buscarPersonasRescatista.php"><span>Buscar Personas</span></a></li>
         	   <li class="active"><a href="calificar.php"><span>Calificar</span></a></li>
         	   <li class="last"><a href="darAdopcion.php"><span>Dar en Adopción</span></a></li>
			</ul>                                                                                     
		</div>                                                                                        
		<div class="clear"></div>                                                                     
	  </div>                                                                                          
   </div>                                                                                             
</div>                                                                                                
<div class="main">
	<div class="busqueda">
            <form id="calificar" action="calificar.php" method="post">
            <p>Adoptante:</p>
            <p>
               <select id= 'com_Adoptante' name='Adoptante' style="width: 200px;">
                    <option value="0">Seleccione el Adoptante</option>
                    <?php
                        $conn = oci_connect(USER, PASS, HOST);
                        $curs = oci_new_cursor($conn);
                        $stid = oci_parse($conn, "begin Get_Adoptantes(:cursbv); end;");
                        oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
                        oci_execute($stid);
                        oci_execute($curs);
                        while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
                            echo '<option value="'.$row["PERSONA_ID"].'">'.$row["NOMBRE"].'<br/><br/> '.$row["APELLIDOS"].'</option>';
                        }

                        oci_free_statement($stid);
                        oci_free_statement($curs);
                        oci_close($conn);
                    ?>
                    
               </select>            
            </p>
            <p class="clasificacion">
            <input id="radio1" type="radio" name="estrellas" value="1"><label for="radio1">&#9733;</label>
            <input id="radio2" type="radio" name="estrellas" value="2"><label for="radio2">&#9733;</label>
            <input id="radio3" type="radio" name="estrellas" value="3"><label for="radio3">&#9733;</label>
            <input id="radio4" type="radio" name="estrellas" value="4"><label for="radio4">&#9733;</label>
            <input id="radio5" type="radio" name="estrellas" value="5"><label for="radio5">&#9733;</label>
            </p>
            <p><input type="submit" value="calificar" name="calificar" /></p>
            </form>  	
        </div> 
</div>

</div>
</body>
</html>

    	
    	
            