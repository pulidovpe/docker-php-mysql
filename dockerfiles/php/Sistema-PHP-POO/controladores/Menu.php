<?php
	/**
	 * Archivo		: Menu.php
	 * Tipo			: Controlador
	 */

	class Menu
	{		
		// Inicio
		function inicio()
		{
			require_once"inc/variables.php";
			require_once"clases/classVista.php";

			$datos["aTitulos"]	= $aTitulos;
			session_start();
			$datos["userNombre"] = $_SESSION["nombreSesion"];
			$datos["userNivel"] 	= $_SESSION["nivelSesion"];
			
			if ($datos["userNivel"] == 1 ) {
				//Salida de la Vista
				$oSalida = new Vista("menu.administrador.php",$datos);
			}
			if ($datos["userNivel"] == 2 ) {
				//Salida de la Vista
				$oSalida = new Vista("menu.operador.php",$datos);
			}
			if ($datos["userNivel"] == 0 ) {
		      // Lo devuelve al inicio de sesion
				$oSalida = new Vista("sesion.inicio.php",$datos); 
			}
		}
	}
?>