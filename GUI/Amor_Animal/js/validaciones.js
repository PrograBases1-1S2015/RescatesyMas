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
			document.getElementById("campo4").value = '';
		}
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
