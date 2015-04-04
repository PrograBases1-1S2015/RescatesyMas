<?php
$q = $_GET["q"];

include ("settings.php");
include ("common.php");




$conn = oci_connect(USER, PASS, HOST);
$stmt = oci_parse($conn, "SELECT NOM_USUARIO FROM USUARIO WHERE NOM_USUARIO = '" . $q . "'" );
oci_execute($stmt);
if(oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_NULLS) > 0)
{
    echo "1";
}

else    
{
    echo "0";
}
oci_close($conn);
//}
?>