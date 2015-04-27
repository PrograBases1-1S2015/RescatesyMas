<?php
/*
file.php
Archivo que nos muestra el archivo pedido a la base de datos
*/
$nom_Usuario = $_COOKIE['id'];

$id= 1;
$user = "proyecto";
$pass = "proyecto";
$tsnames = "localhost/dbprueba";

$Conn = OciLogon($user, $pass, $tsnames);

$query ="SELECT PERSONA.FOTO FROM PERSONA INNER JOIN USUARIO 
          ON PERSONA.USUARIO_ID = USUARIO.USUARIO_ID
          WHERE USUARIO.NOM_USUARIO = '$nom_Usuario'";  
        
$stmt = OCIParse($Conn, $query);

$NewData = array();
OCIDefineByName($stmt,"FOTO",$NewData["FOTO"]);

OCIExecute($stmt);
OCIFetch($stmt);

If (is_object($NewData["FOTO"]))
{
    $NewData["FOTO"] = $NewData["FOTO"]->load();
}

header("Content-type: image/jpeg");

echo $NewData["FOTO"];
OCIFreeStatement($stmt);

?>