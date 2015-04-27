<?php
    
    $nom_Usuario = $_COOKIE['id'];

    $lim_tam = "1024000";

    $foto_Perfil_name = $_FILES['foto_Perfil']['name'];
    $foto_Perfil_size = $_FILES['foto_Perfil']['size'];
    $foto_Perfil = $_FILES['foto_Perfil']['tmp_name'];

    if($foto_Perfil_size >$lim_tam )
    {
        echo "	<script>alert('Alguno de los archivos supera el limite de tamanio, por favor intente con otros.')</script>";
    } 
    else if($_FILES['foto_Perfil']['error']!=0 )
    {
        echo "<script>alert('Error de Archivo, Alguno de los archivos no se puede subir.')</script>";
    }
    else 
    {
    $user = "proyecto";
    $pass = "proyecto";
    $tsnames = "localhost/dbprueba";
    //Aqui se establece la conexion con una base de datos oracle.
    $conn = OCILogon($user,$pass,$tsnames);


    $lob = OCINewDescriptor($conn, OCI_D_LOB);
    

    
        $stmt = OCIParse($conn,"UPDATE (SELECT PERSONA.FOTO FROM PERSONA INNER JOIN USUARIO 
                                ON PERSONA.USUARIO_ID = USUARIO.USUARIO_ID
                                WHERE USUARIO.NOM_USUARIO = '$nom_Usuario') SET FOTO = EMPTY_BLOB()
                                returning FOTO into :the_blob");        
    

    OCIBindByName($stmt, ':the_blob',$lob, -1, OCI_B_BLOB);
    //Ejecucion de la sentencia.
    OCIExecute($stmt, OCI_DEFAULT);
    if($lob->savefile($foto_Perfil))
    {
        OCICommit($conn);
        echo "<script>alert(\"La imagen se subio correctamente.\");</script>";
        echo "<script>javascript:history.back();</script>";
    }
    else
    {
        echo "Couldn't upload Blob\n";
    }
    OCIFreeStatement($stmt);
    OCILogoff($conn);
    }    
?>
