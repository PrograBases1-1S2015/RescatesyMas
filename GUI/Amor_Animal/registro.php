<?php
include ("settings.php");
include ("common.php");


if(isset($_REQUEST['enviar']))
{ 
    $nombre = $_POST['nombre'];
    $Apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $cedula = $_POST['cedula'];
    $telefono = $_POST['telefono'];
    $tipoPersona = $_POST['tipoPersona'];////0
    $telefono = $_POST['telefono'];
    $nomUsuario = $_POST['nomUsuario'];
    $contrasenia = $_POST['contrasenia'];
    $direccionExacta = $_POST['direccionExacta'];
    $distrito = "distrito";//////POR EL MOMENTO SE COLOCA UN VALOR QUEMADO
    
    if($nombre != '' && $Apellidos != '' && $email != '' && $cedula != '' && $telefono != ''
        && $nomUsuario != '' && $contrasenia != '' && $direccionExacta != '' && $distrito != '' )
    {
        $conn = oci_connect(USER, PASS, HOST);
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else
        {
            if($tipoPersona == 'Adoptante')
            {
                $stmt = oci_parse($conn, "begin Registro('$nomUsuario' , '$contrasenia' ,'$direccionExacta' , '$distrito' ,'$nombre' ,'$Apellidos', '$cedula','$telefono' ,'$email', 0); end;");
            }
            else
            {
                $stmt = oci_parse($conn, "begin Registro('$nomUsuario' , '$contrasenia' ,'$direccionExacta' , '$distrito' ,'$nombre' ,'$Apellidos', '$cedula','$telefono' ,'$email', 1); end;");
            }
            oci_execute($stmt); 
            echo "<script>alert(\"Se a registrado correctamente, puede ingresar al sistema\");</script>";
            echo "<script>setTimeout(location.href='index.php#portfolio', 5000);</script>";
        }
        oci_close($conn);
    }
    else
    {
            echo "<script>alert(\"Debe llenar todos los datos intentelo de nuevo.\");</script>";
            echo "<script>javascript:history.back();</script>";
    }
    
    
}



?>