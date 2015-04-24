<?php
include ("settings.php");
include ("common.php");


//#####################Registrar Direcciones########################//

/////Registro País
if (isset($_REQUEST["registrarPais"]))
{
    $pais=$_POST["nombrePais"];
    if ($pais!='' && $pais!='Nombre del País'){
       $conn = oci_connect(USER, PASS, HOST);
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
             $stmt = oci_parse($conn,"begin Agregar_Pais('$pais'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"País ingresado con éxito.\");</script>";
            echo "<script>setTimeout(location.href='registroDirecciones.php#portfolio', 5000);</script>";
        }
        oci_close($conn);
    
    }
else{
     
     echo "<script>alert(\"Debe de ingresar un país.\");</script>";
     echo "<script>javascript:history.back();</script>";
}
}
//Registro provincia
if(isset($_REQUEST["registrarProvincia"])){
    $provincia=$_POST["nombreProvincia"];
    if ($provincia!='' && $provincia!='Provincia'){
        $Pais=$_POST["nombrePais2"];
     
        $conn = oci_connect(USER, PASS, HOST);  
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
            $Pais=$_POST["nombrePais2"]; 
            $stmt = oci_parse($conn,"begin Agregar_Provincia('$provincia','$Pais'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Provincia ingresado con éxito.\");</script>";
            echo "<script>setTimeout(location.href='registroDirecciones.php#portfolio', 5000);</script>";
        }
        oci_close($conn); 
    }
    else{
      echo "<script>alert(\"Debe de ingresar un provincia.\");</script>";
     echo "<script>javascript:history.back();</script>";  
        
    }
}
    //Registrar Cantón
    if(isset($_REQUEST["registrarCanton"])){
    $canton=$_POST["nombreCanton"];
    if ($canton!='' && $canton!='Cantón'){
        
       
        $conn = oci_connect(USER, PASS, HOST);  
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
            $provincia=$_POST["nombreProvincia2"]; 
            $stmt = oci_parse($conn,"begin Agregar_Canton('$canton','$provincia'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Cantón ingresado con éxito.\");</script>";
            echo "<script>setTimeout(location.href='registroDirecciones.php#portfolio', 5000);</script>";
        }
        oci_close($conn); 
    }
    else{
      echo "<script>alert(\"Debe de ingresar un canton.\");</script>";
     echo "<script>javascript:history.back();</script>";  
        
    }
    }
    //Registra Distrito
        if(isset($_REQUEST["registrarDistrito"])){
    $distrito=$_POST["nombreDistrito"];
    if ($distrito!='' && $distrito!='Distrito'){
        
       
        $conn = oci_connect(USER, PASS, HOST);  
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
            $canton=$_POST["nombreCanton2"]; 
            $stmt = oci_parse($conn,"begin Agregar_Distrito('$distrito','$canton'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Distrito ingresado con éxito.\");</script>";
            echo "<script>setTimeout(location.href='registroDirecciones.php#portfolio', 5000);</script>";
        }
        oci_close($conn); 
    }
    else{
      echo "<script>alert(\"Debe de ingresar un canton.\");</script>";
     echo "<script>javascript:history.back();</script>";  
        
    }
}
//#####################Registrar Animales########################//
   //$Registro Animal
    if (isset($_REQUEST["registrarAnimal"])){
    $Animal=$_POST["nombreAnimal"];
      if ($Animal!='' && $Animal!='Animal/Tipo Mascota'){
        
       
        $conn = oci_connect(USER, PASS, HOST);  
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
            $stmt = oci_parse($conn,"begin Agregar_Tipo_Mascota('$Animal'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Animal/Tipo Mascota ingresado con éxito.\");</script>";
            echo "<script>setTimeout(location.href='registroAnimales.php#portfolio', 5000);</script>";
        }
        oci_close($conn); 
    }
    else{
      echo "<script>alert(\"Debe de ingresar un valor.\");</script>";
     echo "<script>javascript:history.back();</script>";  
        
    }
    
   }
   //Registro Raza
   if (isset($_REQUEST["registrarRaza"])){
    $Raza=$_POST["nombreRaza"];
      if ($Raza!='' && $Raza!='Raza'){
         $conn = oci_connect(USER, PASS, HOST);  
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
            $Animal=$_POST["nombreAnimal2"];
            $stmt = oci_parse($conn,"begin Agregar_Raza('$Raza','$Animal'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Raza ingresada con éxito.\");</script>";
            echo "<script>setTimeout(location.href='registroAnimales.php#portfolio', 5000);</script>";
        }
        oci_close($conn); 
    }
    else{
      echo "<script>alert(\"Debe de ingresar un valor.\");</script>";
     echo "<script>javascript:history.back();</script>";  
        
    }
    
   }
   
//########################Registro Enfermedades############################//
   //Agregar Enfermedad
      if (isset($_REQUEST["registrarEnfermedad"])){
    $Enfermedad=$_POST["nombreEnfermedad"];
      if ($Enfermedad!='' && $Enfermedad!='Enfermedad'){
        
       
        $conn = oci_connect(USER, PASS, HOST);  
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
            $stmt = oci_parse($conn,"begin Agregar_Enfermedad('$Enfermedad'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Enfermedad ingresada con éxito.\");</script>";
            echo "<script>setTimeout(location.href='registroEnfermedades.php#portfolio', 5000);</script>";
        }
        oci_close($conn); 
    }
    else{
      echo "<script>alert(\"Debe de ingresar un valor.\");</script>";
     echo "<script>javascript:history.back();</script>";  
        
    }
    
   }
   //Agregar Tratamiento
      
      if (isset($_REQUEST["registrarTratamiento"])){
    $Tra=$_POST["nombreTratamiento"];
      if ($Tra!='' && $Tra!='Tratamiento'){
        $conn = oci_connect(USER, PASS, HOST);  
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
            $Enfermedad=$_POST["nombreEnfermedad2"];
            $stmt = oci_parse($conn,"begin Agregar_Tratamiento('$Tra','$Enfermedad'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Tratamiento ingresado con éxito.\");</script>";
            echo "<script>setTimeout(location.href='registroEnfermedades.php#portfolio', 5000);</script>";
        }
        oci_close($conn); 
    }
    else{
      echo "<script>alert(\"Debe de ingresar un valor.\");</script>";
     echo "<script>javascript:history.back();</script>";  
        
    }
    
   }
   //Agregar Medicamento
        if (isset($_REQUEST["registrarMedicamento"])){
    $Medicamento=$_POST["nombreMedicamento"];
      if ($Medicamento!='' && $Medicamento!='Medicamento'){
        $conn = oci_connect(USER, PASS, HOST);  
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
            $Tratamiento=$_POST["nombreTratamiento2"];
            $stmt = oci_parse($conn,"begin Agregar_Medicamentos('$Medicamento','$Tratamiento'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Medicamento ingresado con éxito.\");</script>";
            echo "<script>setTimeout(location.href='registroEnfermedades.php#portfolio', 5000);</script>";
        }
        oci_close($conn); 
    }
    else{
      echo "<script>alert(\"Debe de ingresar un valor.\");</script>";
     echo "<script>javascript:history.back();</script>";  
        
    }
    
   }

 //$$$$$$$$$$$$$$$$$$$$$$$$$$$Preguntas y respuestas$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$//
   //Registro Formulario   
   if (isset($_REQUEST["registrarFormulario"])){
    $Formulario=$_POST["nombreFormulario"];
      if ($Formulario!='' && $Formulario!='Formulario'){
        $conn = oci_connect(USER, PASS, HOST);  
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
            
            $stmt = oci_parse($conn,"begin Agregar_Formulario('$Formulario'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Formulario ingresado con éxito.\");</script>";
            echo "<script>setTimeout(location.href='registroPreguntas.php#portfolio', 5000);</script>";
        }
        oci_close($conn); 
    }
    else{
      echo "<script>alert(\"Debe de ingresar un valor.\");</script>";
     echo "<script>javascript:history.back();</script>";  
        
    }
    
   }
   //Agregar Pregunta
        if (isset($_REQUEST["registrarPregunta"])){
    $Pregunta=$_POST["nombrePregunta"];
      if ($Pregunta!='' && $Pregunta!='Pregunta'){
        $conn = oci_connect(USER, PASS, HOST);  
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
            
            $stmt = oci_parse($conn,"begin Agregar_Pregunta('$Pregunta'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Pregunta ingresada con éxito.\");</script>";
            echo "<script>setTimeout(location.href='registroPreguntas.php#portfolio', 5000);</script>";
        }
        oci_close($conn); 
    }
    else{
      echo "<script>alert(\"Debe de ingresar un valor.\");</script>";
     echo "<script>javascript:history.back();</script>";  
        
    }
    
   }   
//Agregar Respuesta
      if (isset($_REQUEST["registrarRespuesta"])){
    $Res=$_POST["nombreRespuesta"];
      if ($Res!='' && $Res!='Respuesta'){
        $conn = oci_connect(USER, PASS, HOST);  
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
            $Pregunta=$_POST["nombrePregunta2"];
            $stmt = oci_parse($conn,"begin Agregar_Respuesta('$Res','$Pregunta'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Respuesta ingresada con éxito.\");</script>";
            echo "<script>setTimeout(location.href='registroPreguntas.php#portfolio', 5000);</script>";
        }
        oci_close($conn); 
    }
    else{
      echo "<script>alert(\"Debe de ingresar un valor.\");</script>";
     echo "<script>javascript:history.back();</script>";  
        
    }
   }
   //Agregar PXF
      if (isset($_REQUEST["registrarPregxForm"])){
    
     
        $conn = oci_connect(USER, PASS, HOST);  
        if (!$conn)
        { 
            echo "<script>alert(\"No se pudo conectar a la base de datos, intentelo mas tarde.\");</script>";
            echo "<script>setTimeout(location.href='index.php', 5000);</script>";
        }
        else{
            $P=$_POST["nombrePregunta3"];
            $F=$_POST["nombreFormulario2"];
            $stmt = oci_parse($conn,"begin Agregar_F_X_P('$F','$P'); end;");
            oci_execute($stmt);
            echo "<script>alert(\"Pregunta asignada con éxito.\");</script>";
            echo "<script>setTimeout(location.href='registroPreguntas.php#portfolio', 5000);</script>";
        }
        oci_close($conn); 
    }
    else{
      echo "<script>alert(\"Debe de ingresar un valor.\");</script>";
     echo "<script>javascript:history.back();</script>";  
        
    }
   
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

