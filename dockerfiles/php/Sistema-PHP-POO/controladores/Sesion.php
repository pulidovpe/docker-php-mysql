<?php
/**
	* Archivo   : Sesion.php
	* Type      : Controlador 
	* Function  : Controlador Sesion
	*             Manejo de sesion
	*/


class Sesion {

	//  INICIO  ///
	public function inicio() {

		require_once"clases/classVista.php";
		require_once"inc/variables.php";

		$aTitulos['t3']           = "Iniciar Sesión";
		$datos['aTitulos']        = $aTitulos;
		$datos['userNombre']      = "";

		// Salida de la vista
		$oSalida = new Vista("sesion.inicio.php",$datos); 
	}

	/**
	* Iniciar. PARTE 2
	*
	*/
	function conecta() {

		require_once "inc/variables.php";
		// LOAD FILES
		require_once "modelo/modeloUsuario.php";
		require_once "clases/classVista.php";

		// SESSION VARIABLES
		$userNombre 	= "";
		$descrip 		= "";
		$errorInicio 	= "";
	
		// VALIDATION VARIABLES
		$error = 0;

		//Lee parametros post parameters
		foreach ($_POST as $datoRecibido => $valor) {
			$datos[$datoRecibido] = $valor;
			$$datoRecibido = $valor;
		}

		// Leer la labla              $idConn
		$oUsuario   = new modeloUsuario();

		$rs  = $oUsuario->obtenerLoginClave($usuario,$clave);

		// Transforma el resultado en un arreglo asociativo
		if (!empty($rs) ) 
		{
			$descrip  = $rs['descrip_usu'];
			$clave    = $rs['clave_usu'];
			$activo   = $rs['activo'];
			$S_MOD01  = $rs['modulo01'];
			$S_MOD02  = $rs['modulo02'];
			$S_MOD03  = $rs['modulo03'];
			$S_MOD04  = $rs['modulo04'];
			$S_MOD05  = $rs['modulo05'];
			$S_MOD06  = $rs['modulo06'];
			$S_MOD07  = $rs['modulo07'];
			$S_MOD08  = $rs['modulo08'];
			$S_MOD09  = $rs['modulo09'];
			$S_MOD10  = $rs['modulo10'];
			$S_MOD11  = $rs['modulo11'];
			$S_MOD12  = $rs['modulo12'];
			$S_MOD13  = $rs['modulo13'];
			$S_MOD14  = $rs['modulo14'];
			$S_MOD15  = $rs['modulo15'];
		}

		// parametros para la vista 
		$aTitulos['t3']           = "Menú Principal";
		$datos['aTitulos']        = $aTitulos;

		// Chequea que existan los datos devueltos ( encontro usuario )
		if (!empty($descrip)) {
			// Chequea que el usuario este activo
			if ($activo == 'S') {
				session_start();
				$_SESSION['usuarioSesion'] = $usuario;
				$_SESSION['nombreSesion']  = $descrip;
				// Defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss 
				// Esto para ir verificando el tiempo que llevara conectado el usuario.
				$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");

				// Almacenar los permisos
				$_SESSION['S_MOD01']			= $S_MOD01;
				$_SESSION['S_MOD02']			= $S_MOD02;
				$_SESSION['S_MOD03']			= $S_MOD03;
				$_SESSION['S_MOD04']			= $S_MOD04;
				$_SESSION['S_MOD05']			= $S_MOD05;
				$_SESSION['S_MOD06']			= $S_MOD06;
				$_SESSION['S_MOD07']			= $S_MOD07;
				$_SESSION['S_MOD08']			= $S_MOD08;
				$_SESSION['S_MOD09']			= $S_MOD09;
				$_SESSION['S_MOD10']			= $S_MOD10;
				$_SESSION['S_MOD11']			= $S_MOD11;
				$_SESSION['S_MOD12']			= $S_MOD12;
				$_SESSION['S_MOD13']			= $S_MOD13;
				$_SESSION['S_MOD14']			= $S_MOD14;
				$_SESSION['S_MOD15']			= $S_MOD15;

				// Verificar los permisos para mostrar el menu
				if($S_MOD01 == 'X') $aMenu['op01'] = "";
				if($S_MOD02 == 'X') $aMenu['op02'] = "";
				if($S_MOD03 == 'X') $aMenu['op03'] = "";
				if($S_MOD04 == 'X') $aMenu['op04'] = "";
				if($S_MOD05 == 'X') $aMenu['op05'] = "";
				if($S_MOD06 == 'X') $aMenu['op06'] = "";
				if($S_MOD07 == 'X') $aMenu['op07'] = "";
				if($S_MOD08 == 'X') $aMenu['op08'] = "";
				if($S_MOD09 == 'X') $aMenu['op09'] = "";
				if($S_MOD10 == 'X') $aMenu['op10'] = "";
				if($S_MOD11 == 'X') $aMenu['op11'] = "";
				if($S_MOD12 == 'X') $aMenu['op12'] = "";
				if($S_MOD13 == 'X') $aMenu['op13'] = "";
				if($S_MOD14 == 'X') $aMenu['op14'] = "";
				if($S_MOD15 == 'X') $aMenu['op15'] = "";

				$datos['aMenu']	= $aMenu;
				
				//echo "Usuario encontrado";
				$datos['userNombre'] = $descrip;

				$oSalida = new Vista("menu.principal.php",$datos);
			} else {
				//echo "Usuario NO encontrado";
				$aTitulos['t3']				= "Iniciar Sesión";
				$datos['aTitulos']			= $aTitulos;
				$datos['errorInicio']		= "USUARIO INACTIVO!";
		 
				$oSalida = new Vista('sesion.inicio.php',$datos);
			}

		} else {
			//echo "Usuario NO encontrado";
			$aTitulos['t3']				= "Iniciar Sesión";
			$datos['aTitulos']			= $aTitulos;
			$datos['errorInicio']		= "ERROR EN USUARIO Y/O CLAVE";
	 
			$oSalida = new Vista('sesion.inicio.php',$datos);
		}
	}

	// Conectado
	function conectado() {
		// Carga de archivos/librerias       
		require_once"clases/classVista.php";
		require_once"inc/variables.php";

		// parametros para la vista 
		$aTitulos['t3']           = "Menú Principal";
		$datos['aTitulos']        = $aTitulos;

		session_start();
		if($_SESSION['S_MOD01'] == 'X') $aMenu['op01'] = "";
		if($_SESSION['S_MOD02'] == 'X') $aMenu['op02'] = "";
		if($_SESSION['S_MOD03'] == 'X') $aMenu['op03'] = "";
		if($_SESSION['S_MOD04'] == 'X') $aMenu['op04'] = "";
		if($_SESSION['S_MOD05'] == 'X') $aMenu['op05'] = "";
		if($_SESSION['S_MOD06'] == 'X') $aMenu['op06'] = "";
		if($_SESSION['S_MOD07'] == 'X') $aMenu['op07'] = "";
		if($_SESSION['S_MOD08'] == 'X') $aMenu['op08'] = "";
		if($_SESSION['S_MOD09'] == 'X') $aMenu['op09'] = "";
		if($_SESSION['S_MOD10'] == 'X') $aMenu['op10'] = "";
		if($_SESSION['S_MOD11'] == 'X') $aMenu['op11'] = "";
		if($_SESSION['S_MOD12'] == 'X') $aMenu['op12'] = "";
		if($_SESSION['S_MOD13'] == 'X') $aMenu['op13'] = "";
		if($_SESSION['S_MOD14'] == 'X') $aMenu['op14'] = "";
		if($_SESSION['S_MOD15'] == 'X') $aMenu['op15'] = "";
		
		$datos['aMenu']		 = $aMenu;
		$datos['userNombre'] = $_SESSION['nombreSesion'];
		
		$oSalida = new Vista('menu.principal.php',$datos);
	}

	// Desconectar
	function desconecta($cual = null) {
		// LOAD FILES
		require_once"modelo/modeloUsuario.php";       
		require_once"clases/classVista.php";
		require_once"inc/variables.php";

		// parametros para la vista 
		$aTitulos['t3']			= "Cierre de Sesión";
		$aMensajes['m01']		= "Ud. se ha desconectado exitosamente!";
		$datos['aTitulos']		= $aTitulos;
		$datos['aMensajes']		= $aMensajes;

		session_start();
		session_destroy();
		$oSalida = new Vista('sesion.finalizar.php',$datos);
	}

	// Desconeccion por inactividad
	function cierreforzado() {
		// LOAD FILES
		require_once"modelo/modeloUsuario.php";       
		require_once"clases/classVista.php";
		require_once"inc/variables.php";

		// parametros para la vista 
		$aTitulos['t3']			= "Cierre de Sesión";
		$aMensajes['m01']		= "Se ha cerrado la sesión por inactividad!";
		$datos['aTitulos']		= $aTitulos;
		$datos['aMensajes']		= $aMensajes;

		session_start();
		session_destroy();
		$oSalida = new Vista('sesion.finalizar.php',$datos);
	}		
}

?>