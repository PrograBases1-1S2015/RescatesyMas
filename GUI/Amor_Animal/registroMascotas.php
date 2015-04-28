<?php
require_once ('src/facebook.php');
include ("auth.php");

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


        $config = array();
        $config['appId'] = '1584420661806452';
        $config['secret'] = 'f8bb41e7e88a1bb300a2a6a1b47144af'; // oculte mi secret por seguridad :)
        $config['fileUpload'] = false;

        $facebook = new Facebook($config);

        $params = array(
          'scope' => 'read_stream, friends_likes, publish_actions',
          'redirect_uri' => 'http://localhost/Amor_Animal/registroMascotas.php'
        );

        $loginUrl = $facebook->getLoginUrl($params);

        $userID = $facebook->getAccessToken();

//Al presionar el boton de login
if (isset($_POST['enviar']))
{
    $nombre =  $_POST['nombre'];
    $severidad =  $_POST['severidad'];
    $estadoMascota = $_POST['estadoMascota'];
    $enfermedad = $_POST['enfermedad'];
    $tamanio = $_POST['tamanio'];
    $color = $_POST['color'];
    $nivel_energia =$_POST['nivel_energia'];
    $facilidad_entrenamiento =$_POST['facilidad_entrenamiento'];
    $mascota = $_POST['mascota'];
    $raza = $_POST['raza'];
    $descripcion = $_POST['descripcion'];
    $nota = $_POST['nota'];
    $distrito = $_POST['distrito'];
    $direccionExacta = $_POST['direccionExacta'];
    $tipoPersona = $_POST['tipoPersona'];
    


    
    $lim_tam = "1024000";

    $foto_Antes_name = $_FILES['foto_Antes']['name'];
    $foto_Antes_size = $_FILES['foto_Antes']['size'];
    $foto_Antes = $_FILES['foto_Antes']['tmp_name'];

    $foto_Despues_name = $_FILES['foto_Despues']['name'];
    $foto_Despues_size = $_FILES['foto_Despues']['size'];
    $foto_Despues = $_FILES['foto_Despues']['tmp_name'];

    if($foto_Antes_size >$lim_tam || $foto_Despues_size >$lim_tam )
    {
        echo "	<script>alert('Alguno de los archivos supera el limite de tamanio, por favor intente con otros.')</script>";
    } 
    else if($_FILES['foto_Antes']['error']!=0 || $_FILES['foto_Despues']['error']!=0)
    {
        echo "<script>alert('Error de Archivo, Alguno de los archivos no se puede subir.')</script>";
    }
    else 
    {
    $user = "proyecto";
    $pass = "proyecto";
    $tsnames = "localhost/dbprueba";
    //Aqui se establece la conexion con una base de datos oracle.
    $conn = OCILogon($user,$pass,$tsnames);


    $lob_Antes = OCINewDescriptor($conn, OCI_D_LOB);
    $lob_Despues = OCINewDescriptor($conn, OCI_D_LOB);

    
    if($tipoPersona == 'Adoptante')
    {                                           
        $stmt = OCIParse($conn,"INSERT INTO MASCOTA(mascota_id,nombre,direccion_exacta_id,severidad_id,estado_mascota_id,enfermedad_id,
                                requiere_espacion,foto_antes,foto_despues,veterinario,descripcion,nota_adicional,fecha,raza_id,
                                nivel_energia_id,color_id,tamanio_id,facilidad_entrenamiento_id,rescatista_id)    

                                values (incremento_mascota.nextval, '$nombre',1,'$severidad','$estadoMascota','$enfermedad',
                                0,EMPTY_BLOB(),EMPTY_BLOB(),'Veterinario Quemado','$descripcion','$nota',Sysdate,'$raza',
                                '$nivel_energia','$color','$tamanio','$facilidad_entrenamiento',1)
                                returning foto_antes,foto_despues into :the_blob_Antes, :the_blob_Despues ");
    }
    else
    {
        $stmt = OCIParse($conn,"INSERT INTO MASCOTA(mascota_id,nombre,direccion_exacta_id,severidad_id,estado_mascota_id,enfermedad_id,
                                requiere_espacion,foto_antes,foto_despues,veterinario,descripcion,nota_adicional,fecha,raza_id,
                                nivel_energia_id,color_id,tamanio_id,facilidad_entrenamiento_id,rescatista_id)    

                                values (incremento_mascota.nextval, '$nombre',1,'$severidad','$estadoMascota','$enfermedad',
                                1,EMPTY_BLOB(),EMPTY_BLOB(),'Veterinario Quemado','$descripcion','$nota',Sysdate,'$raza',
                                '$nivel_energia','$color','$tamanio','$facilidad_entrenamiento',1)
                                returning foto_antes,foto_despues into :the_blob_Antes, :the_blob_Despues ");
    }
    



    

    OCIBindByName($stmt, ':the_blob_Antes',$lob_Antes, -1, OCI_B_BLOB);
    OCIBindByName($stmt, ':the_blob_Despues',$lob_Despues, -1, OCI_B_BLOB);
    //Ejecucion de la sentencia.
    OCIExecute($stmt, OCI_DEFAULT);
    if($lob_Antes->savefile($foto_Antes) && $lob_Despues->savefile($foto_Despues))
    {
        OCICommit($conn);
        
        echo "<script>setTimeout(location.href='$loginUrl', 5000);</script>";
        
        if($userID != '1584420661806452|f8bb41e7e88a1bb300a2a6a1b47144af')
            {
                $req =  array(
                'access_token' => $userID,
                'message' => "Se a registrado a '$nombre' una hermosa mascota que puede ser para ti, descubre que tan linda es en nuestra pagina");

                $res = $facebook->api('/me/feed', 'POST', $req);        
            }

        
    }
    else
    {
        echo "Couldn't upload Blob\n";
    }
    OCIFreeStatement($stmt);
    OCILogoff($conn);
    }    


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
    <form action="registroMascotas.php" method="post" enctype="multipart/form-data" >
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
                        <select name='tamanio' style="width: 200px; display: block; float: left;">
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
                </table>

                <table style="float: left;">
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Foto Antes:</label>
                        <input type="file" name="foto_Antes" style="width: 400px; display: block; float: left;">                    
                    </td>
                  </tr>  
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Foto Despues:</label>
                        <input type="file" name="foto_Despues" style="width: 400px; display: block; float: left;">                    
                    </td>
                  </tr>  
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Descripción del rescate:</label>
                        <textarea COLS=15 ROWS=3 NAME='descripcion' style="width: 200px; display: block; float: left;"> </Textarea>                    
                    </td>
                  </tr>
                  <tr><td>&nbsp; </td></tr>
                  <tr>
                    <td width="500">
                        <label style="width: 200px; display: block; float: left;" >Nota Adicional:</label>
                        <textarea COLS=15 ROWS=3 NAME='nota' style="width: 200px; display: block; float: left;">
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
                        <textarea COLS=20 ROWS=5 NAME='direccionExacta' style="width: 200px; display: block; float: left;">
                        </Textarea> 
                    </td>
                  </tr>


                </table>
                <div style="clear: both;"></div>
                <br/>
                <input id="campo10" name="enviar" type="submit" value="Enviar" /> 
                
	</form>
	  
	</div>

</div>

    <!-- Validaciones -->
    <script src="js/misFunciones.js"></script>



</body>
</html>
      