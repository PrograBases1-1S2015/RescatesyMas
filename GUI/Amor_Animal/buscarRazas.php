<?php
$q = $_POST["q"];
include ("settings.php");
include ("common.php"); 
error_reporting(0);
$conn = oci_connect(USER, PASS, HOST);
$curs = oci_new_cursor($conn);
$stid = oci_parse($conn, "begin Buscar_Razas('$q',:cursbv); end;");
oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
oci_execute($stid);
oci_execute($curs);  


?>




<select id="combo2" style="width: 120px;">
<option>Seleccione la Raza</option>
<?php
 
while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo '<option value="'.$row["RAZA_ID"].'">'.$row["RAZA"].'</option>';
}

oci_free_statement($stid);
oci_free_statement($curs);
oci_close($conn);

?>
</select>
