<?php
/**
  * ENCABEZADO
  * 
  *Archivo   : cabeceras.php
  *Funcion   : Vista del encabezado para la aplicacion e inclusion de librerias.
  */
?>
<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="es"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="es"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="es"> 
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<!-- Use the .htaccess and remove these lines to avoid edge case issues. More info: h5bp.com/i/378 -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $aTitulos["t1"]; ?></title>
	<link type="text/css" rel="stylesheet" href="css/estilo.css"/>
	<script src="inc/js/scripts.js" type="text/javascript"></script>
	<script type="text/javascript">
		// Cada 10 segundos verificamos si no ha caducado la sesion, sino, se cerrara autom.
		// LLamamos la funcion con los repectivos parametros del DIV que queremos refrescar.
		window.onload = function refresca() {
			refrescaDiv('centro_contenedor',5,'controladores/auto.php');
		}
	</script>
</head>