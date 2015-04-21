<?php
$q = $_POST["q"];
include ("settings.php");
include ("common.php"); 

$conn = oci_connect(USER, PASS, HOST);
$curs = oci_new_cursor($conn);
$stid = oci_parse($conn, "begin Buscar_Cantones('$q',:cursbv); end;");
oci_bind_by_name($stid, ":cursbv", $curs, -1, OCI_B_CURSOR);
oci_execute($stid);
oci_execute($curs);  


?>




<select id="combo2" style="width: 120px;">
<option>Seleccione la provincia</option>
<?php
 
while (($row = oci_fetch_array($curs, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
    echo '<option value="'.$row["CANTON_ID"].'">'.$row["CANTON"].'</option>';
}

oci_free_statement($stid);
oci_free_statement($curs);
oci_close($conn);

?>
</select>
