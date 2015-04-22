var xmlhttp;

///////////////////VALIDACIONES CEDULA//////////////////////////////////////////
function verificarCedula(cedula)
{
	xmlhttp = GetXmlHttpObject();
	
	if (xmlhttp == null)
	{
		alert ("El navegador no soporta la solicitud HTTP realizada.");
		return;
	}
	var url = "validarCedula.php";
	url = url + "?q=" + cedula;
	xmlhttp.onreadystatechange = stateChangedCedula;
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
}

function stateChangedCedula()
{
	if (xmlhttp.readyState == 4)
	{
		if(xmlhttp.responseText == 1)
		{
                    alert ("El numero de cedula ya existe en la base de datos.");
                    document.getElementById("campo5").value = '';
		}
	}
}

///////////////////VALIDACIONES USUARIO//////////////////////////////////////////

function verificarUsuario(usuario)
{
	xmlhttp = GetXmlHttpObject();
	
	if (xmlhttp == null)
	{
		alert ("El navegador no soporta la solicitud HTTP realizada.");
		return;
	}
	var url = "validarUsuario.php";
	url = url + "?q=" + usuario;
	xmlhttp.onreadystatechange = stateChangedUsuario;
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
}

function stateChangedUsuario()
{
	if (xmlhttp.readyState == 4)
	{
		if(xmlhttp.responseText == 1)
		{
                    alert ("El nombre de usuario ya existe en la base de datos.");
                    document.getElementById("campo8").value = '';
		}
	}
}

///////////////////VALIDACIONES CORREO//////////////////////////////////////////

function verificarCorreo(correo)
{
	xmlhttp = GetXmlHttpObject();
	
	if (xmlhttp == null)
	{
		alert ("El navegador no soporta la solicitud HTTP realizada.");
		return;
	}
	var url = "validarCorreo.php";
	url = url + "?q=" + correo;
	xmlhttp.onreadystatechange = stateChangedCorreo;
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
}




function stateChangedCorreo()
{
	if (xmlhttp.readyState == 4)
	{
		if(xmlhttp.responseText == 1)
		{
                    alert ("El correo electronico ya existe en la base de datos.");
                    document.getElementById("campo4").value = '';
		}
	}
}


/////////////////////////////////////////////////////////////////////////////////


function getProvincia(id_ComboPais)
{ 
    
    xmlhttp = GetXmlHttpObject();

    if (xmlhttp == null)
    {
            alert ("El navegador no soporta la solicitud HTTP realizada.");
            return;
    }
    xmlhttp.onreadystatechange = stateChangedProvincia;
    xmlhttp.open("POST","buscarProvincias.php",true);

//establece el header para la respuesta
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

//enviamos las variables al archivo get_combo2.php
    xmlhttp.send("q=" + id_ComboPais);	

}

function stateChangedProvincia()
{
    if (xmlhttp.readyState===4 && xmlhttp.status===200)
    {
        document.getElementById("com_Provincia").innerHTML=xmlhttp.responseText;
    }
}

/////////////////////////////////////////////////////////////////////////////////



function getCanton(id_ComboProvincia)
{ 
    
    xmlhttp = GetXmlHttpObject();

    if (xmlhttp == null)
    {
            alert ("El navegador no soporta la solicitud HTTP realizada.");
            return;
    }
    xmlhttp.onreadystatechange = stateChangedCanton;
    xmlhttp.open("POST","buscarCantones.php",true);

//establece el header para la respuesta
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

//enviamos las variables al archivo get_combo2.php
    xmlhttp.send("q=" + id_ComboProvincia);	

}

function stateChangedCanton()
{
    if (xmlhttp.readyState===4 && xmlhttp.status===200)
    {
        document.getElementById("com_Canton").innerHTML=xmlhttp.responseText;
    }
}

//////////////////////////////////////////////////////////////////////////////////



function getDistrito(id_ComboCanton)
{ 
    
    xmlhttp = GetXmlHttpObject();

    if (xmlhttp == null)
    {
            alert ("El navegador no soporta la solicitud HTTP realizada.");
            return;
    }
    xmlhttp.onreadystatechange = stateChangedDistritos;
    xmlhttp.open("POST","buscarDistritos.php",true);

//establece el header para la respuesta
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

//enviamos las variables al archivo get_combo2.php
    xmlhttp.send("q=" + id_ComboCanton);	

}

function stateChangedDistritos()
{
    if (xmlhttp.readyState===4 && xmlhttp.status===200)
    {
        document.getElementById("com_Distrito").innerHTML=xmlhttp.responseText;
    }
}

//////////////////////////////////////////////////////////////////////////////////



function getRaza(id_ComboRaza)
{ 
    
    xmlhttp = GetXmlHttpObject();

    if (xmlhttp == null)
    {
            alert ("El navegador no soporta la solicitud HTTP realizada.");
            return;
    }
    xmlhttp.onreadystatechange = stateChangedRaza;
    xmlhttp.open("POST","buscarRazas.php",true);

//establece el header para la respuesta
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");

//enviamos las variables al archivo get_combo2.php
    xmlhttp.send("q=" + id_ComboRaza);	

}

function stateChangedRaza()
{
    if (xmlhttp.readyState===4 && xmlhttp.status===200)
    {
        document.getElementById("con_raza").innerHTML=xmlhttp.responseText;
    }
}




function GetXmlHttpObject()
{
	if (window.XMLHttpRequest)
	{
		// Codigo para IE7+, Firefox, Chrome, Opera, Safari
		return new XMLHttpRequest();
	}
	
	if (window.ActiveXObject)
	{
		// Codigo para IE6, IE5
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	return null;
}




function justNumbers(e)
    {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;
 
        return /\d/.test(String.fromCharCode(keynum));
    }
