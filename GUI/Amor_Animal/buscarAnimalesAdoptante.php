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
                        <li class="last"><a href="indexAdoptante.php"><span>Inicio</span></a></li>
                        <li class="last"><a href="buscarAnimalesAdoptante.php"><span>Buscar Animales</span></a></li>
                        <li class="last"><a href="buscarPersonasAdoptante.php"><span>Buscar Personas</span></a></li>
                        <li class="last"><a href="test.php"><span>Test</span></a></li>
                        <li class="last"><a href="devolucion.php"><span>Devolver MAscota</span></a></li>
                        <li class="last"><a href="perfilA.php"><span>Mi perfil</span></a></li>
                    </ul>
		</div>                                                                                        
		<div class="clear"></div>                                                                     
	  </div>                                                                                          
   </div>                                                                                             
</div>                                                                                                
<div class="main">
	
<div class="busqueda">
    <form id="busquedaMascota" action="buscarAnimalesAdoptante.php" method="post">
                         <select name='color' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione el color</option>
                            <?php
                                $conn = oci_connect(USER, PASS, HOST);
                                $curs = oci_new_cursor($conn);
                                $stid = oci_parse($conn, "begin Get_Color(:cursbv); end;");
                                oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
                                oci_execute($stid);
                                oci_execute($curs); 
                                while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) 
                                {
                                    echo '<option value="'.$row["COLOR_ID"].'">'.$row["COLOR"].'</option>';
                                }

                                oci_free_statement($stid);
                                oci_free_statement($curs);
                                oci_close($conn);
                            ?>
                        </select>
                        
                         <select name='tamaño' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione el tamano</option>
                            <?php
                                $conn = oci_connect(USER, PASS, HOST);
                                $curs = oci_new_cursor($conn);
                                $stid = oci_parse($conn, "begin Get_Tamanio(:cursbv); end;");
                                oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
                                oci_execute($stid);
                                oci_execute($curs); 
                                while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) 
                                {
                                    echo '<option value="'.$row["TAMANIO_ID"].'">'.$row["TAMANIO"].'</option>';
                                }

                                oci_free_statement($stid);
                                oci_free_statement($curs);
                                oci_close($conn);
                            ?>
                        </select>
        
                         <select id = 'con_mascota' name='mascota' onChange="getRaza(this.value);"  style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione el Tipo de Mascota</option>
                            <?php
                                $conn = oci_connect(USER, PASS, HOST);
                                $curs = oci_new_cursor($conn);
                                $stid = oci_parse($conn, "begin Get_Tipo_Mascota(:cursbv); end;");
                                oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
                                oci_execute($stid);
                                oci_execute($curs); 
                                while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) 
                                {
                                    echo '<option value="'.$row["TIPO_MASCOTA_ID"].'">'.$row["TIPO_MASCOTA"].'</option>';
                                }

                                oci_free_statement($stid);
                                oci_free_statement($curs);
                                oci_close($conn);
                            ?>
                       </select>
        
                        <select id = 'con_raza' name='raza' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione la Raza</option>
                       </select>
        
                       <select name='nivel_energia' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione el nivel</option>
                            <?php
                                $conn = oci_connect(USER, PASS, HOST);
                                $curs = oci_new_cursor($conn);
                                $stid = oci_parse($conn, "begin Get_Nivel_Energia(:cursbv); end;");
                                oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
                                oci_execute($stid);
                                oci_execute($curs); 
                                while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) 
                                {
                                    echo '<option value="'.$row["NIVEL_ENERGIA_ID"].'">'.$row["NIVEL_ENERGIA"].'</option>';
                                }

                                oci_free_statement($stid);
                                oci_free_statement($curs);
                                oci_close($conn);
                            ?>
                        </select>
                        <input id="campoFormulario" name="distrito" type="text" value="Distrito"/>
                        <select name='estadoMascota' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione el Estado de la Mascota</option>
                            <?php
                                $conn = oci_connect(USER, PASS, HOST);
                                $curs = oci_new_cursor($conn);
                                $stid = oci_parse($conn, "begin Get_Estado_Mascota(:cursbv); end;");
                                oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
                                oci_execute($stid);
                                oci_execute($curs); 
                                while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) 
                                {
                                    echo '<option value="'.$row["ESTADO_MASCOTA_ID"].'">'.$row["ESTADO_MASCOTA"].'</option>';
                                }

                                oci_free_statement($stid);
                                oci_free_statement($curs);
                                oci_close($conn);
                            ?>
                       </select>
                        
                         <select name='facilidad_entrenamiento' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione la facilidad</option>
                            <?php
                                $conn = oci_connect(USER, PASS, HOST);
                                $curs = oci_new_cursor($conn);
                                $stid = oci_parse($conn, "begin Get_Facilidad_Entrenamiento(:cursbv); end;");
                                oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
                                oci_execute($stid);
                                oci_execute($curs); 
                                while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) 
                                {
                                    echo '<option value="'.$row["FACILIDAD_ENTRENAMIENTO_ID"].'">'.$row["FACILIDAD_ENTRENAMIENTO"].'</option>';
                                }

                                oci_free_statement($stid);
                                oci_free_statement($curs);
                                oci_close($conn);
                            ?>
                        </select>
                        <input id="campoFormulario" name="nombre" type="text" value="Nombre"/>
                        <input type="submit" name='buscar' value="Buscar" />
                       
        </form> 
             <section id="resultados"> 
                 <div class="tabla">
                <?php 
                if (isset($_POST['buscar'])){

                 $nombre = $_POST['nombre'];
                 $distrito = $_POST['distrito'];
                 $raza = $_POST['raza'];
                 $color = $_POST['color'];
                 $estado = $_POST['estadoMascota'];
                 $tamanio = $_POST['tamaño'];
                 $mascota = $_POST['mascota'];
                 $nivel_energia = $_POST['nivel_energia'];
                 $nivelEntrenamiento = $_POST['facilidad_entrenamiento'];
                 

                $conn = oci_connect(USER, PASS, HOST);
                $curs = oci_new_cursor($conn);
                $stid = oci_parse($conn, "begin Buscar_Mascota('$nombre','$distrito','$raza','$color','$estado','$tamanio','$mascota','$nivel_energia','$nivelEntrenamiento',:cursbv); end;");
                oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
                $a=oci_execute($stid);
                $b=oci_execute($curs);

                  if ($a == true){
                       ?>
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

                  }
                  oci_free_statement($stid);
                  oci_free_statement($curs);
                  oci_close($conn);

                 }
             ?>

 </table> 
</div>                     
 </section>  
	</div>

</div>
</body>
</html>

    	
    	
            