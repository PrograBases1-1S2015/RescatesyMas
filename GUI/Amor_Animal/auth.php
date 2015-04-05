<?php
include ("settings.php");
include ("common.php");
if(isset($_COOKIE['id']))
{
   $username = $_COOKIE['id'];
   $pass = $_COOKIE['key'];
   $administrador = $_COOKIE['admin'];
   
   $conn = oci_connect(USER, PASS, HOST);
   $stmt = oci_parse($conn, "SELECT * FROM USUARIO WHERE NOM_USUARIO = '" . $username . "'" );
   oci_execute($stmt);
   while(($row = oci_fetch_array($stmt)))
   {
       
        if ($pass != $row['CONTRASENIA'])
        {
            header("Location: index.php");
        }
        else
        {
            actualizar_cookie($username,$pass,$administrador);
        }
   }
   oci_close($conn);
}
else

{
   header("Location: index.php");
}
?>
