<?php
/**
  * Archivo   : index.php
  * Type      : Controlador frontal
  * Function  : Punto de entrada a la aplicacion
  *             Lista de contacto
  */


if(!empty($_GET['cnt'])) {
	$nombreControl = $_GET['cnt'];
} else {
	// $nombreControl = "Personal";
  $nombreControl = "Sesion";
}

$rutaControl = 'controladores/'. $nombreControl . '.php';

if(!empty($_GET['act'])) {
	$nombreAction = $_GET['act'];
} else {
	$nombreAction = "inicio";
}

require $rutaControl;

$oControlador = new $nombreControl;
$oControlador->$nombreAction();

?>