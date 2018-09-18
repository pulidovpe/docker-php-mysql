<?php session_start();
if(!isset($_SESSION['usuarioSesion'])) { 
	echo " ";
	//exit;
} else {
	//sino, calculamos el tiempo transcurrido
	$fechaGuardada = $_SESSION["ultimoAcceso"];
	$ahora = date("Y-n-j H:i:s");
	$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));

	//comparamos el tiempo transcurrido 
	if($tiempo_transcurrido >= 300) {  //si pasaron 5 minutos (300) o más
		session_destroy(); // destruyo la sesión
		echo "Salir"; // no modificar
	} 
	//echo "<h2 style='color:BLACK'>" . $tiempo_transcurrido . " segundos</h2>";
} 
?>