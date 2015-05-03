<?php
error_reporting(0);
include ("auth.php");
$U=$_COOKIE['id'];

if (isset($_REQUEST["enviar"])){
    $nombre=$_POST["nombre"];
    $Apellidos=$_POST["apellidos"];
    $contraseña=$_POST["contrasenia"];
    $correo=$_POST["email"];
    $telefono=$_POST["telefono"];
    $Direccion=$_POST["direccionExacta"];
    $distrito=$_POST["distrito"];
   
   
if($nombre!=' ' && $Apellidos!=' ' && $contraseña!=' ' && $correo!=' ' && $telefono!=''){
    $conn = oci_connect(USER, PASS, HOST);
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
             $stmt = oci_parse($conn,"begin Actualizar('$U','$nombre','$Apellidos','$telefono','$correo','$contraseña','$Direccion','$distrito'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Datos cambiados con éxito.\");</script>";
            echo "<script>setTimeout(location.href='PerfilA.php', 5000);</script>";
        }
        oci_close($conn);
}
    
    
    
}


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

