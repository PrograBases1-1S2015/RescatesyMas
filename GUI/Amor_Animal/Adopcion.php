<?php
    include 'auth.php';
    
    if (isset($_REQUEST["adoptar"])){
        $Usuario=$_COOKIE['id'];
        $UAdoptante=$_POST["dato"];
        
        if ($UAdoptante!='' && $UAdoptante!="Nombre Completo"){
            $existeusuario=FALSE;
            $Conn = oci_connect(USER, PASS, HOST);
            $sql_1 = "SELECT A.ADOPTANTE_ID  AS EXISTEADOPTANTE
                FROM ADOPTANTE A,PERSONA P, USUARIO U
                WHERE U.NOM_USUARIO='$UAdoptante' AND U.USUARIO_ID=P.USUARIO_ID AND P.PERSONA_ID=A.PERSONA_ID AND P.ESTADO_LISTANEGRA='no'";
            $sql_2 = OCIParse($Conn, $sql_1);
            OCIExecute($sql_2, OCI_DEFAULT);
            While (OCIFetchInto($sql_2, $row, OCI_ASSOC))
            {
                if($row['EXISTEADOPTANTE'] > 0)
                {
                        $existeusuario = TRUE;
                }
            }
  
OCIFreeStatement($sql_2);
OCILogoff($Conn);
            if ($existeusuario==TRUE){
                $conn = oci_connect(USER, PASS, HOST);
                if (!$conn)
                    { 
                        echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
                        echo "<script>setTimeout(location.href='index.php', 5000);</script>";
                    }
            else{
                $Mascota= $_POST["tamaño"];
                $stmt = oci_parse($conn,"begin Agregar_Adopciones('$UAdoptante','$Mascota'); end;");
                oci_execute($stmt);
                echo "<script>alert(\"Adopción realizada con éxito.\");</script>";
                echo "<script>setTimeout(location.href='darAdopcion.php#portfolio', 5000);</script>";
        }
        oci_close($conn);
                 
                
            }
            else{
              echo "<script>alert(\"Parece que tenemos problemas al localizar el usuario esto puede ser"
                . "porqué no existe, es un rescatista ó el usuario está en la lista negra.\");</script>";
              echo "<script>javascript:history.back();</script>";  
            }
        }
        else{
             echo "<script>alert(\"Debe ingresar un usuario.\");</script>";
             echo "<script>javascript:history.back();</script>";
        }
     }
     
       if (isset($_REQUEST["devolver"])){
           $U=$_COOKIE['id'];
           $CAUSA=$_POST["causa"];
           $MASCOTA=$_POST["mascota"];
          
           $conn = oci_connect(USER, PASS, HOST);
            
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
            $stmt = oci_parse($conn,"begin  Agregar_Devoluciones('$U','$MASCOTA','$CAUSA'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Devolución realizada con éxito.\");</script>";
            echo "<script>setTimeout(location.href='devolucion.php#portfolio', 5000);</script>";
        }
        oci_close($conn);
           
       }


