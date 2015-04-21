<?php
include ("settings.php");
include ("common.php");
if(isset($_COOKIE['id']))
{
   $username = $_COOKIE['id'];
   $pass = $_COOKIE['key'];
   $administrador = $_COOKIE['admin'];
   
   $conn = oci_connect(USER, PASS, HOST);
   $stmt = oci_parse($conn,"begin :password := Usuario_Password('" . $username . "'); end;" );
   oci_bind_by_name($stmt, ':password', $password, 40);
   oci_execute($stmt);
   
//   while(($row = oci_fetch_array($stmt)))
//   {
       
        if ($pass != $password)
        {
            header("Location: index.php");
        }
        else
        {
            actualizar_cookie($username,$pass,$administrador);
        }
//   }
        oci_close($conn);
}
else

{
   header("Location: index.php");
}
?>
