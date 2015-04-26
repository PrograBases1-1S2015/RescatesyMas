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
<title>Free 4Pets Website Template | About :: w3layouts</title>
<link href="css/styleIndex.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'> 
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>  
<!--light-box-->
<script type="text/javascript" src="js/jquery.lightbox.js"></script>
<link rel="stylesheet" type="text/css" href="css/lightbox.css" media="screen">
	<script type="text/javascript">
            
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
			   <li><a href="registroMascotas.php"><span>Registro de Mascotas</span></a></li>
			   <li class="active"><a href="buscarAnimalesRescatista.php"><span>Buscar Animales</span></a></li>
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
	
<div class="busqueda">
    <form id="busquedaMascota" action="" method="post">
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
                            <option value="0">Seleccione el tamaño</option>
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
                            <option >Seleccione el Tipo de Mascota</option>
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
                            <option >Seleccione la Raza</option>
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
                        
                    <input id="campoFormulario" name="nombre" type="text" value="Nombre"/>
                        <input id="campoFormulario" name="fecha" type="text" value="Fecha"/>
                    
                   		
                   	<input id="campoBoton" name="buscar" type="submit" value="Buscar" />
        </form>      
	</div>

    <div id='mostrar'> 
    </div>
</div>
  <script src="js/misFunciones.js"></script>
</body>
</html>

    	
    	
            