<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ("settings.php");
include ("common.php"); 
error_reporting(0);

$conn = oci_connect(USER, PASS, HOST);
$curs = oci_new_cursor($conn);
$stid = oci_parse($conn, "begin Get_Todas_Mascotas(:cursbv); end;");
oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
oci_execute($stid);
oci_execute($curs);  

?>

<table border='1'   >
    <tr><td>Nombre</td><td>Fecha</td><td>Descripción</td><td>Nota Adicional</td>
        <td>Dirección Exacta</td><td>Distrito</td><td>Estado de la mascota</td><td>Raza</td>
        <td>Tipo de Mascota</td><td>Tamanio</td><td>Rescatista</td><td>Numero de Telefono</td></tr>
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