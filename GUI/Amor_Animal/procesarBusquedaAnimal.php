<?php
include ("settings.php");
include ("common.php");



    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $email = $_POST['email'];
    $color = $_POST['color'];
    $tamanio = $_POST['tamanio'];
    $raza = $_POST['raza'];////0
    $tipoMascota = $_POST['tipoMascota'];
    $nivelEnergía = $_POST['nivelEnergía'];
    $distrito = $_POST['distrito'];
    $estado = $_POST['estado'];
    $nivelEntrenamiento = $_POST['nivelEntrenamiento'];
    
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
   

