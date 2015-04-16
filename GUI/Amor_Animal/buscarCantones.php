<?php
$q = $_POST["q"];
include ("settings.php");
include ("common.php"); 
//conexion con mysql

 
$conn = oci_connect(USER, PASS, HOST);
$stmt = oci_parse($conn, "SELECT * FROM CANTON WHERE PROVINCIA_ID = '" . $q . "'" );
oci_execute($stmt);


?>



<!--Este es el verdadero combo2 que mostramos con los datos cargados-->
<select id="combo2" style="width: 120px;">
<option>Seleccione el cantón</option>
<?php
    while (($row = oci_fetch_array($stmt, OCI_BOTH)) != false)
    {
        echo '<option value="'.$row["CANTON_ID"].'">'.$row["CANTON"].'</option>';
    }
    oci_close($conn);//hacemos el query para obtener los datos segun la
     
?>
</select>