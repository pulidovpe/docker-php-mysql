<?php
/***
	* Archivo   : variables.php
	* Type      : libreria 
	* Function  : Declaracion de variables, 
	*             constantes y/o arreglos asociativos.
	*/
  
	// arreglo para los Titulos
	$aTitulos['t1']	= "SISTEMA VACIO";	// Titulo de la barra del navegador.
	$aTitulos['t2']	= "Sistema en PHP basado en POO";	// Titulo Principal en H1.
	$aTitulos['t3']	= "";	// Titulo del Modulo activo en H2.
	$aTitulos['t4']	= "";   // Titulo del Metodo/Funcion activa en H2/H3.

	// arreglo para mensajes
	$aMensajes['m01'] = "";
	$aMensajes['m02'] = "";
	
	// arreglo de los Nombres de los módulos
	$aNomMod['m01']	= "Perfiles de Usuario";
	$aNomMod['m02']	= "Módulo número 02";
	$aNomMod['m03']	= "Módulo número 03";
	$aNomMod['m04']	= "Módulo número 04";
	$aNomMod['m05']	= "Una opcion un poco mas larga. 05";
	$aNomMod['m06']	= "Módulo número 06";
	$aNomMod['m07']	= "Módulo número 07";
	$aNomMod['m08']	= "Módulo número 08";
	$aNomMod['m09']	= "Módulo número 09";
	$aNomMod['m10']	= "Una opcion un poco mas larga. 10";
	$aNomMod['m11']	= "Módulo número 11";
	$aNomMod['m12']	= "Módulo número 12";
	$aNomMod['m13']	= "Módulo número 13";
	$aNomMod['m14']	= "Módulo número 14";
	$aNomMod['m15']	= "Una opcion un poco mas larga. 15";

	// arreglo de las Rutas de los módulos
	$aRutaMod['m01']	= "index.php?cnt=Usuario&act=inicio";
	$aRutaMod['m02']	= "";
	$aRutaMod['m03']	= "";
	$aRutaMod['m04']	= "";
	$aRutaMod['m05']	= "";
	$aRutaMod['m06']	= "";
	$aRutaMod['m07']	= "";
	$aRutaMod['m08']	= "";
	$aRutaMod['m09']	= "";
	$aRutaMod['m10']	= "";
	$aRutaMod['m11']	= "";
	$aRutaMod['m12']	= "";
	$aRutaMod['m13']	= "";
	$aRutaMod['m14']	= "";
	$aRutaMod['m15']	= "";

	// arreglo de las Opciones del menu
	$aMenu['op01']		= "<article><a href='".$aRutaMod['m01']."'><img src='inc/img/imagen01.jpeg' alt='".$aNomMod['m01']."' height='50' width='50' /><p>".$aNomMod['m01']."</p></a></article>";
	$aMenu['op02']		= "<article><a href='".$aRutaMod['m02']."'><img src='inc/img/imagen02.jpeg' alt='".$aNomMod['m02']."' height='50' width='50' /><p>".$aNomMod['m02']."</p></a></article>";
	$aMenu['op03']		= "<article><a href='".$aRutaMod['m03']."'><img src='inc/img/imagen03.jpeg' alt='".$aNomMod['m03']."' height='50' width='50' /><p>".$aNomMod['m03']."</p></a></article>";
	$aMenu['op04']		= "<article><a href='".$aRutaMod['m04']."'><img src='inc/img/imagen04.jpeg' alt='".$aNomMod['m04']."' height='50' width='50' /><p>".$aNomMod['m04']."</p></a></article>";
	$aMenu['op05']		= "<article><a href='".$aRutaMod['m05']."'><img src='inc/img/imagen05.jpeg' alt='".$aNomMod['m05']."' height='50' width='50' /><p>".$aNomMod['m05']."</p></a></article>";
	$aMenu['op06']		= "<article><a href='".$aRutaMod['m06']."'><img src='inc/img/imagen06.jpeg' alt='".$aNomMod['m06']."' height='50' width='50' /><p>".$aNomMod['m06']."</p></a></article>";
	$aMenu['op07']		= "<article><a href='".$aRutaMod['m07']."'><img src='inc/img/imagen07.jpeg' alt='".$aNomMod['m07']."' height='50' width='50' /><p>".$aNomMod['m07']."</p></a></article>";
	$aMenu['op08']		= "<article><a href='".$aRutaMod['m08']."'><img src='inc/img/imagen08.jpeg' alt='".$aNomMod['m08']."' height='50' width='50' /><p>".$aNomMod['m08']."</p></a></article>";
	$aMenu['op09']		= "<article><a href='".$aRutaMod['m09']."'><img src='inc/img/imagen09.jpeg' alt='".$aNomMod['m09']."' height='50' width='50' /><p>".$aNomMod['m09']."</p></a></article>";
	$aMenu['op10']		= "<article><a href='".$aRutaMod['m10']."'><img src='inc/img/imagen10.jpeg' alt='".$aNomMod['m10']."' height='50' width='50' /><p>".$aNomMod['m10']."</p></a></article>";
	$aMenu['op11']		= "<article><a href='".$aRutaMod['m11']."'><img src='inc/img/imagen11.jpeg' alt='".$aNomMod['m11']."' height='50' width='50' /><p>".$aNomMod['m11']."</p></a></article>";
	$aMenu['op12']		= "<article><a href='".$aRutaMod['m12']."'><img src='inc/img/imagen12.jpeg' alt='".$aNomMod['m12']."' height='50' width='50' /><p>".$aNomMod['m12']."</p></a></article>";
	$aMenu['op13']		= "<article><a href='".$aRutaMod['m13']."'><img src='inc/img/imagen13.jpeg' alt='".$aNomMod['m13']."' height='50' width='50' /><p>".$aNomMod['m13']."</p></a></article>";
	$aMenu['op14']		= "<article><a href='".$aRutaMod['m14']."'><img src='inc/img/imagen14.jpeg' alt='".$aNomMod['m14']."' height='50' width='50' /><p>".$aNomMod['m14']."</p></a></article>";
	$aMenu['op15']		= "<article><a href='".$aRutaMod['m15']."'><img src='inc/img/imagen15.jpeg' alt='".$aNomMod['m15']."' height='50' width='50' /><p>".$aNomMod['m15']."</p></a></article>";
	$aMenu['op20']		= "<article><a href='index.php?cnt=Sesion&act=desconecta'><img src='inc/img/imagen20.jpeg' alt='Desconectar' height='50' width='50' /><p>Desconectar</p></a></article>";
	
	// arreglo de los permisos del menu
	//$aPermiso['Mod01']= "X";
	
	// Variables del paginador
	$mostrarReg = 10;

	// Combo de listas Desplegables
	$combo_dpto  = array(
		"1" => "Académico",
		"2" => "Administración",
		"3" => "Asobies",
		"4" => "Decanato",
		"5" => "DIN",
		"6" => "Dpto. de TIC",
		"7" => "Postgrado",
		"8" => "Pregrado",
		"9" => "Recursos Humanos",
		"10" => "Secretaría",
		"11" => "Servicios Generales",
		"12" => "DAS y PC"
	 );
?>