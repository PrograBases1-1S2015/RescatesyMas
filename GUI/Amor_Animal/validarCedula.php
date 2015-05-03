<?php
$q = $_GET["q"];
error_reporting(0);
include ("settings.php");
include ("common.php");




$conn = oci_connect(USER, PASS, HOST);

$stmt = oci_parse($conn,"begin :cedula := Verificar_Cedula('" . $q . "'); end;" );
oci_bind_by_name($stmt, ':cedula', $cedula, 40);
oci_execute($stmt);

if($cedula == $q)
{
    echo "1";
}

else    
{
    echo "0";
}
oci_close($conn);
?>