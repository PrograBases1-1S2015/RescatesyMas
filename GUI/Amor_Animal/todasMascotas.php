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
<?php

    while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false){
    echo '<tr> <td>'.$row["NOMBRE"]+'</td>'+
        '<td>'.$row["FECHA"].'</td>'+
        '<td>'.$row["DESCRIPCION"].'</td>'+
        '<td>'.$row["NOTA_ADICIONAL"].'</td>'+
        '<td>'.$row["DIRECCION_EXACTA"].'</td>'+
        '<td>'.$row["DISTRITO"].'</td>'+
        '<td>'.$row["ESTADO_MASCOTA"].'</td>'+
        '<td>'.$row["RAZA"].'</td>'+
        '<td>'.$row["TIPO_MASCOTA"].'</td>'+
        '<td>'.$row["TAMANIO"].'</td>'+
        '<td>'.$row["NOMBRE"].'</td>'+
        '<td>'.$row["NUM_TELEFONO_1"].'</td> </tr>';
 }
 



oci_free_statement($stid);
oci_free_statement($curs);
oci_close($conn);

?>
</table>