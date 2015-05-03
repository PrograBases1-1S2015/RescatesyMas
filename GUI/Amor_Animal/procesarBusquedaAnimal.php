   <?php
        include ("settings.php");
        include ("common.php");
        error_reporting(0);
    if(isset($_POST['buscar'])){
        if (isset($_POST['color'])){
            $color = $_POST['color'];
        }else{
            $color='';
        }
        echo $color;
        if (isset($_POST['tamaño'])){
            $tamanio = $_POST['tamaño'];
        }else{
            $tamanio='';
        }
          echo $tamanio;
        if (isset($_POST['mascota'])){
            $mascota = $_POST['mascota'];
        }else{
            $mascota='';
        }
            echo $mascota;
        if (isset($_POST['raza'])){
            $raza = $_POST['raza'];
        }else{
            $raza='';
        }
            echo $raza;
        if (isset($_POST['nivel_energia'])){
            $nivel_energia = $_POST['nivel_energia'];
        }else{
            $nivel_energia='';
        }
    
            echo $nivel_energia;
        if (isset($_POST['distrito'])){
            $distrito = $_POST['distrito'];
        }else{
            $distrito='';
        }
            echo $distrito;
        if (isset($_POST['estadoMascota'])){
            $estado = $_POST['estadoMascota'];
        }else{
            $estado='';
        }
            echo $estado;
        if (isset($_POST['facilidad_entrenamiento'])){
            $nivelEntrenamiento = $_POST['facilidad_entrenamiento'];
       }else{
           $nivelEntrenamiento='';
       }
        echo $nivelEntrenamiento;
       if (isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
       }else{
           $nombre='';
       }
       echo $nombre;
       
       if (isset($_POST['fecha'])){
            $fecha = $_POST['fecha'];
       }else{
           $fecha='';
       }
       echo $fecha;
    }
    
    $conn = oci_connect(USER, PASS, HOST);
    $curs = oci_new_cursor($conn);
    $stid = oci_parse($conn, "begin Buscar_Mascota('$nombre','$fecha','$distrito','$raza','$color','$estado','$tamanio','$mascota','$nivel_energia','$nivelEntrenamiento',:cursbv); end;");
    oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
    $a=oci_execute($stid);
    $b=oci_execute($curs);
    
?>
<table id='mostrar' style="border:1px solid #000000;" cellspacing="0" cellpadding="0">
    <tr><td style="border:1px solid #000000;">Nombre</td><td style="border:1px solid #000000;">Fecha</td><td style="border:1px solid #000000;">Descripción</td><td>Nota Adicional</td>
        <td style="border:1px solid #000000;">Dirección Exacta</td><td style="border:1px solid #000000;">Distrito</td><td>Estado de la mascota</td><td>Raza</td>
        <td style="border:1px solid #000000;">Tipo de Mascota</td><td style="border:1px solid #000000;">Tamanio</td><td>Rescatista</td><td>Numero de Telefono</td></tr>
<?php
    
    while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
        echo "<tr>\n";
        foreach ($row as $item) {
        echo "<td >" . ($item !== null ? htmlentities($item, ENT_QUOTES,'ISO-8859-1') : "Nombre") . "</td>\n";
    }
        echo "</tr>\n";
 }


oci_free_statement($stid);
oci_free_statement($curs);
oci_close($conn);

?>
 </table>
   

