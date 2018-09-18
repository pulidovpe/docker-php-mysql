function muestraOculta(valor,cual_div) {
	if(valor=='1' || valor=='2') 
		document.getElementById(cual_div).style.display='block';
	else {
		document.getElementById(cual_div).style.display='none';
		document.getElementById('clave').value='';
		/* document.getElementById('clave2').value=''; */
	}
}
// funcion usada en conjunto con el archivo auto.php para controlar el tiempo que tiene
// un usuario conectado, y cerrar la sesion automaticamente.
function refrescaDiv(div,segs,url)
{
	// define our vars
	var div,segs,url,fetch_unix_timestamp;
	 
	// Chequeamos que las variables no esten vacias..
	if(div == ""){ alert('Error: escribe el id del div que quieres refrescar'); return;}
	else 
		if(!document.getElementById(div)){ alert('Error: el Div ID selectionado no esta definido: '+div); return;}
		else 
			if(segs == ""){ alert('Error: indica la cantidad de segundos que quieres que el div se refresque'); return;}
			else 
				if(url == ""){ alert('Error: la URL del documento que quieres cargar en el div no puede estar vacia.'); return;}
	 
	// The XMLHttpRequest object
	var xmlHttp;
	try {
		xmlHttp=new XMLHttpRequest(); // Firefox, Opera 8.0+, Safari
	}
	catch (e) {
		try {
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP"); // Internet Explorer
		}
		catch (e) {
			try {
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e){
				alert("Tu explorador no soporta AJAX.");
				return false;
			}
		}
	}
	 
	// Timestamp para evitar que se cachee el array GET
	fetch_unix_timestamp = function()
	{
		return parseInt(new Date().getTime().toString().substring(0, 10))
	}
	 
	var timestamp = fetch_unix_timestamp();
	var nocacheurl = url+"?t="+timestamp;
	 
	// the ajax call
	xmlHttp.onreadystatechange=function() {
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			//alert("responseText: "+xmlHttp.responseText);
			if(xmlHttp.responseText == "Salir") {								
				window.location='index.php?cnt=Sesion&act=cierreforzado';
				//alert('Sesi\u00f3n expirada!');
			} else {
				document.getElementById(div).innerHTML=xmlHttp.responseText;
			}			
			setTimeout(function(){refrescaDiv(div,segs,url);},segs*1000);
		}
	}
	xmlHttp.open("GET",nocacheurl,true);
	xmlHttp.send(null);
}
/*
function mensaje(cual) {
	switch(cual) {
		case '00': alert("Usuario y/o clave incorrectos!");break;
		case '01': alert("Registro incluido exitosamente!");break;
		case '02': alert("Registro modificado exitosamente!");break;
		case '03': alert("Registro eliminado exitosamente!");break;
		case '04': alert("Inicio de sesion exitoso!");break;
		case '05': alert("Ud. se ha desconectado exitosamente!");
	}
}
*/