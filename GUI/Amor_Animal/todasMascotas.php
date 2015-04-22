<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include ("settings.php");
include ("common.php"); 


$conn = oci_connect(USER, PASS, HOST);
$curs = oci_new_cursor($conn);
$stid = oci_parse($conn, "begin Get_Todas_Mascotas(:cursbv); end;");
oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
oci_execute($stid);
oci_execute($curs);  

?>



<table>
    while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
    echo '<tr>
        <td>.$row["m.nombre"].</td>
        <td>.$row["m.fecha"].</td>
        <td>.$row["m.descripcion"].</td>
        <td>.$row["m.nota_adicional"].</td>
        <td>.$row["de.direccion_exacta"].</td>
        <td>.$row["d.distrito"].</td>
        <td>.$row["em.estado_mascota"].</td>
        <td>.$row["e.enfermedad"].</td>
        <td>.$row["r.raza"].</td>
        <td>.$row["tm.tipo_mascota"].</td>
        <td>.$row["t.tamanio"].</td>
        <td>.$row["p.nombre"].</td>
        <td>.$row["p.num_telefono_1"].</td>
        <td>.$row[""].</td>
    </tr>';
 }
    
</table>
<?php
 


oci_free_statement($stid);
oci_free_statement($curs);
oci_close($conn);

?>
</select>