<?php
include ("auth.php");
//include ("settings.php");
//include ("common.php");

//Al presionar el boton de login
if (isset($_POST['entrar']))
{ // if form has been submitted
   if(!$_POST['logNomusuario'] | !$_POST['logContrasenia'])
   {//Verificar que las casillas no esten en blanco
      die('Es necesario escribir un Usuario y una contraseña <a href=index.php>Intente de nuevo</a>');
      
   }
   $usuario = $_POST['logNomusuario'];
   $conn = oci_connect(USER, PASS, HOST);
   $curs = oci_new_cursor($conn);
   $stid = oci_parse($conn, "begin Buscar_Usuario('$usuario',:cursbv); end;");
   oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
   oci_execute($stid);
   oci_execute($curs);  

   if (oci_fetch_array($curs) == 0) 
   {
       echo "<script>alert(\"El usuario no existe en la base de datos.\");</script>";
       echo "<script>javascript:history.back();</script>";
   }
   $curs = oci_new_cursor($conn);
   $stid = oci_parse($conn, "begin Buscar_Usuario('$usuario',:cursbv); end;");
   oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
   oci_execute($stid);
   oci_execute($curs);  
   
   while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false)
   {
      if ($_POST['logContrasenia'] != $row['CONTRASENIA']) 
      {
          echo "<script>alert(\"Password incorrecto.\");</script>";
          echo "<script>javascript:history.back();</script>";
      }
      else
      {
        if($row['TIPO_USUARIO'] == 1)
        {
             header("Location:  registroAnimales.php");
        }
        else
        {
            //if(es adoptante){header("Location: indexAdoptante.php");}
            //else{header("Location: indexRescatista.php");}
            actualizar_cookie($_POST['logNomusuario'],$_POST['logContrasenia'],$row['TIPO_USUARIO']);
            header("Location: indexRescatista.php");
        }
      }
   }
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
			   <li class="active"><a href="registroMascotas.php"><span>Registro de Mascotas</span></a></li>
			   <li class="has-sub"><a href="buscarAnimalesRescatista.php"><span>Buscar Animales</span></a></li>
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
		<form action="" method="post" >
            <legend>Formulario de Registro</legend>
                <table style="float: left;" >
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Nombre:</label>
                        <input id="campo1" name="nombre" type="text" style="width: 200px; display: block; float: left;" />
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                    	 <label style="width: 200px; display: block; float: left;" >Severidad:</label>
                       <select name='severidad' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione la Severidad</option>
                            <?php
                                $conn = oci_connect(USER, PASS, HOST);
                                $curs = oci_new_cursor($conn);
                                $stid = oci_parse($conn, "begin Get_Severidad(:cursbv); end;");
                                oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
                                oci_execute($stid);
                                oci_execute($curs); 
                                while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) 
                                {
                                    echo '<option value="'.$row["SEVERIDAD_ID"].'">'.$row["SEVERIDAD"].'</option>';
                                }

                                oci_free_statement($stid);
                                oci_free_statement($curs);
                                oci_close($conn);
                            ?>
                       </select>

                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Estado de la Mascota:</label>
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
                    </td>
                  </tr>
                   <tr><td>&nbsp; </td></tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Enfermedad:</label>
                        <select name='enfermedad' style="width: 200px; display: block; float: left;">
                            <option value="0">Seleccione la Enfermedad</option>
                            <?php
                                $conn = oci_connect(USER, PASS, HOST);
                                $curs = oci_new_cursor($conn);
                                $stid = oci_parse($conn, "begin Get_Enfermedad(:cursbv); end;");
                                oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
                                oci_execute($stid);
                                oci_execute($curs); 
                                while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) 
                                {
                                    echo '<option value="'.$row["ENFERMEDAD_ID"].'">'.$row["ENFERMEDAD"].'</option>';
                                }

                                oci_free_statement($stid);
                                oci_free_statement($curs);
                                oci_close($conn);
                            ?>
                        </select>

                    </td>
                  <tr>
				   <tr><td>&nbsp; </td></tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Tamaño:</label>
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
                    </td>
                  	<tr>
					<tr><td>&nbsp; </td></tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Color:</label>
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
                    </td>
                  	<tr>
					<tr><td>&nbsp; </td></tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Nivel de Engergía:</label>
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
                    </td>
                  	<tr>
					<tr><td>&nbsp; </td></tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Facilidad de Entrenamiento:</label>
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
                    </td>
                  	<tr>

   					<tr><td>&nbsp; </td></tr>
                    <td width="500">
                        <label for="rescatista" style="width: 200px; display: block; float: left;" >Requiere Espacio:</label>
                        <input type="radio" name="tipoPersona" id="rescatista" value="Rescatista" />
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label for="adoptante" style="width: 200px; display: block; float: left;" >No requiere espacio:</label>
                        <input type="radio" name="tipoPersona" id="adoptante" value="Adoptante" checked  />
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                </table>

                <table style="float: left;">
				<tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Tipo de Mascota:</label>
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
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                 <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Raza:</label>
                       <select id = 'con_raza' name='raza' style="width: 200px; display: block; float: left;">
                            <option >Seleccione la Raza</option>
                       </select>
                    </td>
                  </tr>
                <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Descripción del rescate:</label>
                        <textarea COLS=15 ROWS=3 NAME='descripcion'>
                        </Textarea>                    
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Nota Adicional:</label>
                        <textarea COLS=15 ROWS=3 NAME='nota'>
                        </Textarea>                    
                    </td>
                  </tr>
                  </table>
                  <table style="float: left;" >
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >País:</label>
                       <select name='pais' onChange="getProvincia(this.value);" style="width: 200px; display: block; float: left;">
                        <option>Seleccione el pais</option>
                            <?php
                                $conn = oci_connect(USER, PASS, HOST);
                                $curs = oci_new_cursor($conn);
                                $stid = oci_parse($conn, "begin Get_Paises(:cursbv); end;");
                                oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
                                oci_execute($stid);
                                oci_execute($curs); 
                                while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) 
                                {
                                    echo '<option value="'.$row["PAIS_ID"].'">'.$row["PAIS"].'</option>';
                                }

                                oci_free_statement($stid);
                                oci_free_statement($curs);
                                oci_close($conn);
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
                            <option value="0">Seleccione el cantón</option>
                       </select>
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Distrito:</label>
                       <select id="com_Distrito" name='distrito' style="width: 200px; display: block; float: left;">
                            <option value="0">Selecciones el distrito</option>
                       </select>
                    </td>
                  </tr>
                <tr>
                 <tr><td>&nbsp; </td></tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Dirección Exacta:</label>
                        <textarea COLS=20 ROWS=5 NAME='direccionExacta'>
                        </Textarea> 
                    </td>
                  </tr>


                </table>
                <div style="clear: both;"></div>
                
                <input id="campo10" name="enviar" type="submit" value="Enviar" />                
                
	</form>
	  
	</div>

</div>

    <!-- Validaciones -->
    <script src="js/misFunciones.js"></script>



</body>
</html>

    	
    	
            