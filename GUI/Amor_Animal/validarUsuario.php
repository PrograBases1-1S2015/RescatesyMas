<?php
$q = $_GET["q"];

include ("settings.php");
include ("common.php");


$conn = oci_connect(USER, PASS, HOST);

$stmt = oci_parse($conn,"begin :usuario := Verificar_Usuario('" . $q . "'); end;" );
oci_bind_by_name($stmt, ':usuario', $Usuario, 40);
oci_execute($stmt);

if($Usuario == $q)
{
    echo "1";
}

else    
{
    echo "0";
}
oci_close($conn);

?>