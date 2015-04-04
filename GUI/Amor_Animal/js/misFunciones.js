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

///////////////////cargar combo de paises

function cargarProvincias(pais)
{
	xmlhttp = GetXmlHttpObject();
	
	if (xmlhttp == null)
	{
		alert ("El navegador no soporta la solicitud HTTP realizada.");
		return;
	}
	var url = "cargarProvincias.php";
	url = url + "?q=" + pais;
	xmlhttp.onreadystatechange = stateChangedPaises;
	xmlhttp.open("GET", url, true);
	xmlhttp.send(null);
}




function stateChangedPaises()
{
	if (xmlhttp.readyState == 4)
	{
		if(xmlhttp.responseText == 1)
		{
			document.getElementById("provincia").innerHTML = xmlhttp.responseText;
		}
	}
}



function from(id,ide,url)
{
    //alert ("El navegador no soporta la solicitud HTTP realizada.");
    var miPeticion = GetXmlHttpObject();

        var mi_aleatorio=parseInt(Math.random()*99999999);//para que no guarde la página en el caché...

        var vinculo=url+"?id="+id+"&rand="+mi_aleatorio;

        //alert ("El navegador no soporta la solicitud HTTP realizada.");

        miPeticion.open("GET",vinculo,true);//ponemos true para que la petición sea asincrónica

        miPeticion.onreadystatechange=miPeticion.onreadystatechange=function(){

               if (miPeticion.readyState==4)

               {

                   //alert(miPeticion.readyState);

                       if (miPeticion.status==200)

                       {

                                //alert(miPeticion.status);

                               //var http=miPeticion.responseXML;

                               var http=miPeticion.responseText;

                               document.getElementById(ide).innerHTML= http;



                       }

               }/*else

               {

            document.getElementById(ide).innerHTML="<img src='ima/loading.gif' title='cargando...' />";



                }*/

       }

       miPeticion.send(null);



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
