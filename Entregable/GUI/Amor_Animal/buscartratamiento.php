<?php
$q = $_POST["q"];
include ("settings.php");
include ("common.php"); 
error_reporting(0);
$conn = oci_connect(USER, PASS, HOST);
$curs = oci_new_cursor($conn);
$stid = oci_parse($conn, "begin Buscar_Tratamientos('$q',:cursbv); end;");
oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
oci_execute($stid);
oci_execute($curs);  


?>




<select id="combo2" style="width: 120px;">
<option>Seleccione el tratamiento</option>
<?php
 
while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo '<option value="'.$row["TRATAMIENTO_ID"].'">'.$row["TRATAMIENTO"].'</option>';
}

oci_free_statement($stid);
oci_free_statement($curs);
oci_close($conn);

?>
</select>

