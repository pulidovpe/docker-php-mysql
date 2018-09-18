<?php
 /**
  * Archvo   :  dbConnect.php
  * Funcion  :  Variables de conexion a la base de datos recibidas del archivo .env
  */

	$hostname = getenv('MYSQL_HOST');
	$username = getenv('MYSQL_USERNAME');
	$password = getenv('MYSQL_PASSWORD');
	$database = getenv('MYSQL_DATABASE');
	
?>
