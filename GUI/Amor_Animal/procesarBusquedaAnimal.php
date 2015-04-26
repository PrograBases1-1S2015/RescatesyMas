<?php
include ("settings.php");
include ("common.php");


    if (isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
    }else{
        $nombre='';
    }
    if (isset($_POST['fecha'])){
    $fecha = $_POST['fecha'];
    }else{
        $fecha='';
    }
     if (isset($_POST['email'])){
    $email = $_POST['email'];
    }else{
        $email='';
    }
    
    if (isset($_POST['color'])){
    $color = $_POST['color'];
    }else{
        $color='';
    }
    
     if (isset($_POST['tamanio'])){
    $tamanio = $_POST['tamanio'];
    }else{
        $tamanio='';
    }
    
     if (isset($_POST['raza'])){
    $raza = $_POST['raza'];////0
    }else{
        $raza='';
    }
    
    if (isset($_POST['tipoMascota'])){
    $tipoMascota = $_POST['tipoMascota'];
    }else{
        $tipoMascota='';
    }
    
    if (isset($_POST['nivelEnergía'])){
    $nivelEnergía = $_POST['nivelEnergía'];
    }else{
        $nivelEnergía='';
    }
    
     if (isset($_POST['distrito'])){
    $distrito = $_POST['distrito'];
    }else{
        $distrito='';
    }
    
    if (isset($_POST['estado'])){
    $estado = $_POST['estado'];
    }else{
        $estado='';
    }
     if (isset($_POST['nivelEntrenamiento'])){
    $nivelEntrenamiento = $_POST['nivelEntrenamiento'];
    }else{
        $nivelEntrenamiento='';
    }
    
    $conn = oci_connect(USER, PASS, HOST);
    $curs = oci_new_cursor($conn);
    $stid = oci_parse($conn, "begin Buscar_Mascota('$nombre','$fecha','$distrito','$raza','$color','$estado','$tamanio','$tipoMascota','$nivelEnergía','$nivelEntrenamiento':cursbv); end;");
    oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
    oci_execute($stid);
    oci_execute($curs);  
?>
<table style="border:1px solid #000000;" cellspacing="0" cellpadding="0">
    <tr><td style="border:1px solid #000000;">Nombre</td><td style="border:1px solid #000000;">Fecha</td><td style="border:1px solid #000000;">Descripción</td><td>Nota Adicional</td>
        <td style="border:1px solid #000000;">Dirección Exacta</td><td style="border:1px solid #000000;">Distrito</td><td>Estado de la mascota</td><td>Raza</td>
        <td style="border:1px solid #000000;">Tipo de Mascota</td><td style="border:1px solid #000000;">Tamanio</td><td>Rescatista</td><td>Numero de Telefono</td></tr>
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
   

