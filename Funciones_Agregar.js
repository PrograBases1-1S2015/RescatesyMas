//Agregar a misfunciones.js//
/////////////Funciones para el administrador////////
//No es la mejor forma de hacerlo, pero es la única que se me ocurre
function getProvincia1(id_ComboPais)
{ 
    
    xmlhttp = GetXmlHttpObject();

    if (xmlhttp == null)
    {
            alert ("El navegador no soporta la solicitud HTTP realizada.");
            return;
    }
    xmlhttp.onreadystatechange = stateChangedProvincia1;
    xmlhttp.open("POST","buscarProvincias.php",true);

//establece el header para la respuesta
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

//enviamos las variables al archivo get_combo2.php
    xmlhttp.send("q=" + id_ComboPais);	

}

function stateChangedProvincia1()
{
    if (xmlhttp.readyState===4 && xmlhttp.status===200)
    {
        document.getElementById("com_Provincia1").innerHTML=xmlhttp.responseText;
    }
}
////////////////////////////////////////////////////////////////////////////////7
function get_Tratamiento(id_ComboEnfermedad)
{ 
    
    xmlhttp = GetXmlHttpObject();

    if (xmlhttp == null)
    {
            alert ("El navegador no soporta la solicitud HTTP realizada.");
            return;
    }
    xmlhttp.onreadystatechange = stateChangedTratamiento;
    xmlhttp.open("POST","buscartratamiento.php",true);

//establece el header para la respuesta
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

//enviamos las variables al archivo get_combo2.php
    xmlhttp.send("q=" + id_ComboEnfermedad);	

}

function stateChangedTratamiento()
{
    if (xmlhttp.readyState===4 && xmlhttp.status===200)
    {
        document.getElementById("com_Tratamiento").innerHTML=xmlhttp.responseText;
    }
}