<?php
/**
	* Archivo   : Usuario.php
	* Type      : Controlador 
	* Function  : Crea los objetos Usuario
	*/

class Usuario 
{
	// Metodo del paginador para iniciar e ir a la primera pagina
	public function inicio() {  

		require_once "inc/variables.php";
		require_once "clases/classVista.php";
		require_once "modelo/modeloUsuario.php";		
		
		// LECTURA DE LA TABLA usuario
		$oUsuario = new modeloUsuario();
		$rs = $oUsuario->leerTodo(0,$mostrarReg);
		
		//Transforma el resultado $rs en un arreglo asociativo
		/*$item = array();
		while ($rows = $rs) 
		{
			$item[] = $rows;
		}*/

		// CALCULAR NUMERO DE PAGINAS
		$ultimoReg = $oUsuario->contarRegistro();
		$ultimaPag = $ultimoReg/$mostrarReg;
		//verificamos residuo para ver si llevará decimales
		$Res = $ultimoReg % $mostrarReg;
		// si hay residuo usamos funcion floor para que me
		// devuelva la parte entera, SIN REDONDEAR, y le sumamos
		// una unidad para obtener la ultima pagina
		if($Res > 0) $ultimaPag = floor($ultimaPag)+1;

		$numPag = 0; // Primera pagina
		//echo "Numero de Pagina: ".$numPag;

		// parametros para la vista    
		$aTitulos['t3']             = $aNomMod['m01'];
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['item']              = $rs; //antes $item
		$datos['numPag']            = $numPag;
		$datos['ultimaPag']         = $ultimaPag;
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];

		// Si tiene acceso al modulo 01
		if ($datos['S_MOD01'] != 'X' ) {
			// Salida de la vista
			$oSalida = new Vista("usuario.php",$datos); 
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}
	}
	// Metodo del paginador para ir a la ultima pagina
	public function fin() {  

		require_once"clases/classVista.php";
		require_once"modelo/modeloUsuario.php";
		// conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";
		
		// LECTURA DE LA TABLA usuario
		$oUsuario = new modeloUsuario();

		// CALCULAR NUMERO DE PAGINAS
		$ultimoReg = $oUsuario->contarRegistro();
		$ultimaPag = $ultimoReg/$mostrarReg;
		//verificamos residuo para ver si llevará decimales
		$Res = $ultimoReg % $mostrarReg;
		// si hay residuo usamos funcion floor para que me
		// devuelva la parte entera, SIN REDONDEAR, y le sumamos
		// una unidad para obtener la ultima pagina
		if($Res > 0) $ultimaPag = floor($ultimaPag)+1;
		$inicioReg = ($ultimaPag-1) * $mostrarReg;
		$rs = $oUsuario->leerTodo($inicioReg,$mostrarReg);
		$numPag = $ultimaPag;
		//Transforma el resultado $rs en un arreglo asociativo
		/*$item = array();
		while ($rows = $rs)   
		{
			$item[] = $rows;
		}*/

		// parametros para la vista    
		$aTitulos['t3']             = $aNomMod['m01'];
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['item']              = $rs; //antes $item
		$datos['numPag']            = $numPag-1;
		$datos['ultimaPag']         = $ultimaPag;
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];

		// Si tiene acceso al modulo 01
		if ($datos['S_MOD01'] != 'X' ) {
			// Salida de la vista
			$oSalida = new Vista("usuario.php",$datos); 
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}
	}
	// Metodo del paginador para avanzar 1 registro
	public function adelante() {  

		require_once"clases/classVista.php";
		require_once"modelo/modeloUsuario.php";
		require_once"inc/variables.php";

		// Lectura de la pagina solicitada desde el formulario
		foreach ($_GET as $datoRecibido => $valor) {
			// El $$ no es un error
			// va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}

		$oUsuario = new modeloUsuario();
		// CALCULAR NUMERO DE PAGINAS
		$numPag++;   
		$inicioReg = $numPag * $mostrarReg;
		$ultimoReg = $oUsuario->contarRegistro();
		$ultimaPag = $ultimoReg/$mostrarReg;
		//verificamos residuo para ver si llevará decimales
		$Res = $ultimoReg % $mostrarReg;
		// si hay residuo usamos funcion floor para que me
		// devuelva la parte entera, SIN REDONDEAR, y le sumamos
		// una unidad para obtener la ultima pagina
		if($Res > 0) $ultimaPag = floor($ultimaPag)+1;
		//echo "Numero de Pagina: ".$numPag." Inicio: ".$inicioReg; 

		// LECTURA DE LA TABLA usuario
		$rs = $oUsuario->leerTodo($inicioReg,$mostrarReg); 
		//Transforma el resultado $rs en un arreglo asociativo
		/*$item = array();
		while ($rows = $rs) 
		{
			$item[] = $rows;
		}*/

		// parametros para la vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['item']              = $rs; //antes $item
		$datos['numPag']            = $numPag;
		$datos['ultimaPag']         = $ultimaPag;
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];

		// Si tiene acceso al modulo 01
		if ($datos['S_MOD01'] != 'X' ) {
			// Salida de la vista
			$oSalida = new Vista("usuario.php",$datos); 
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}
	}
	// Metodo del paginador para retroceder 1 registro
	public function atras() {  

		require_once"clases/classVista.php";
		require_once"modelo/modeloUsuario.php";
		// conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";

		// Lectura de la pagina solicitada desde el formulario
		foreach ($_GET as $datoRecibido => $valor) {
			// El $$ no es un error, va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}

		$oUsuario = new modeloUsuario();
		// CALCULAR NUMERO DE PAGINAS
		$ultimoReg = $oUsuario->contarRegistro();
		$ultimaPag = $ultimoReg/$mostrarReg;
		//verificamos residuo para ver si llevará decimales
		$Res = $ultimoReg % $mostrarReg;
		// si hay residuo usamos funcion floor para que me
		// devuelva la parte entera, SIN REDONDEAR, y le sumamos
		// una unidad para obtener la ultima pagina
		if($Res > 0) $ultimaPag = floor($ultimaPag)+1;
		$numPag--;
		$inicioReg = $numPag * $mostrarReg;
		//echo "Numero de Pagina: ".$numPag." Inicio: ".$inicioReg;

		// LECTURA DE LA TABLA usuario
		$rs = $oUsuario->leerTodo($inicioReg,$mostrarReg);
		
		//Transforma el resultado $rs en un arreglo asociativo
		/*$item = array();
		while ($rows = $rs)  
		{
			$item[] = $rows;
		}*/

		// parametros para la vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['item']              = $rs; //antes $item
		$datos['numPag']            = $numPag;
		$datos['ultimaPag']         = $ultimaPag;
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];

		// Si tiene acceso al modulo 01
		if ($datos['S_MOD01'] != 'X' ) {
			// Salida de la vista
			$oSalida = new Vista("usuario.php",$datos); 
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}
	}

	// Incluir Usuarios//
	function incluir() {

		require_once"clases/classVista.php";
		require_once"inc/variables.php";

		// Parametros de la Vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$aTitulos['t4']             = "Nuevo usuario";
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['id']                = "";
		$datos['descrip']           = "";
		$datos['clave']             = "";
		$datos['activo']            = "";
		$datos['mod01']             = "";
		$datos['mod02']             = "";
		$datos['mod03']             = "";
		$datos['mod04']             = "";
		$datos['mod05']             = "";
		$datos['mod06']             = "";
		$datos['mod07']             = "";
		$datos['mod08']             = "";
		$datos['mod09']             = "";
		$datos['mod10']             = "";
		$datos['mod11']             = "";
		$datos['mod12']             = "";
		$datos['mod13']             = "";
		$datos['mod14']             = "";
		$datos['mod15']             = "";
		$datos['errorId']           = "";
		$datos['errorDescrip']      = "";
		$datos['errorClave']        = "";
		$datos['errorModulo']       = "";
		$datos['error']             = "";

		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];

		// Si tiene permiso de escritura en el modulo 01
		if ($_SESSION['S_MOD01'] == 'E' ) {
			// Salida de la Vista
			$oSalida = new Vista("usuario.incluir.php",$datos);
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		} 
	}

	// Incluir 2
	function grabar() {

		require_once"clases/classVista.php";
		require_once"clases/classValidar.php";
		require_once"modelo/modeloUsuario.php";
		// Conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";

		// Lectura de datos del formulario
		foreach ($_POST as $datoRecibido => $valor) {
			// El $$ no es un error, va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}
		
		/******************************************/
		// Verificar si hay errores en las validaciones
		$oValida = new Validar();
		$valores = $oValida->validaUsuario($datos);

		// Parametros de la Vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$aTitulos['t4']             = "Nuevo usuario";
		$valores['aTitulos']        = $aTitulos;
		$valores['aNomMod']			= $aNomMod;

		$id                = $valores['id'];
		$descrip           = $valores['descrip'];
		$clave             = $valores['clave'];
		$activo            = $valores['activo'];
		$mod01             = $valores['mod01'];
		$mod02             = $valores['mod02'];
		$mod03             = $valores['mod03'];
		$mod04             = $valores['mod04'];
		$mod05             = $valores['mod05'];
		$mod06             = $valores['mod06'];
		$mod07             = $valores['mod07'];
		$mod08             = $valores['mod08'];
		$mod09             = $valores['mod09'];
		$mod10             = $valores['mod10'];
		$mod11             = $valores['mod11'];
		$mod12             = $valores['mod12'];
		$mod13             = $valores['mod13'];
		$mod14             = $valores['mod14'];
		$mod15             = $valores['mod15'];

		session_start();
		$valores['userNombre']        = $_SESSION['nombreSesion'];		
		$valores['S_MOD01']           = $_SESSION['S_MOD01'];

		// Pruebas aqui
		//echo "errorId: ".$errorId." - errorDescrip: ".$errorDescrip." - ErrorModulo: ".$errorModulo;
		//echo "<br />valores mod01: ".$valores['mod01']." - mod02: ".$valores['mod02']." - mod03: ".$valores['mod03'];
		//echo "<br />datos mod01: ".$mod01." - mod02: ".$mod02." - mod03: ".$mod03;

		// Si tiene permiso de escritura en el modulo 01
		if ($_SESSION['S_MOD01'] == 'E' ) {
			// Salida de la Vista
			if ($valores['error'] > 0) {
				echo "// Volvemos a pedir los datos en la vista";
				$oSalida = new Vista("usuario.incluir.php",$valores);
			} else {
				// Insertar datos en la tabla
				$oUsuario = new modeloUsuario();
				$errorIns = $oUsuario->insertar($id,$descrip,$clave,$activo,$mod01,$mod02,$mod03,$mod04,$mod05,$mod06,$mod07,$mod08,$mod09,$mod10,$mod11,$mod12,$mod13,$mod14,$mod15);
				// Sino hubo error al insertar (como un id ya existente): ";//echo "$errorIns";exit();
				if ($errorIns != false) {
					$oSalida = new Vista("usuario.incluir.ok.php",$valores);
					//echo "sin error";
				} else {
					$datos['errorId']        = "Id/Cédula ya existe!!!";
					//$datos['errorIns']       = $errorIns;
					$oSalida = new Vista("usuario.incluir.php",$valores);
					//echo "con error";
				}      
			}
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$valores); 
		}
	}

	// Modificar Usuario
	function modificar() {

		require_once"clases/classVista.php";
		require_once"clases/classValidar.php";
		require_once"modelo/modeloUsuario.php";
		// Conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";

		// Lectura del ID del formulario
		foreach ($_GET as $datoRecibido => $valor) {
			// El $$ no es un error, va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}

		//Leer el registro a modificar
		$oUsuario = new modeloUsuario();
		$rs = $oUsuario->obtenerDatos($id);
	
		$descrip = $rs['descrip_usu'];
		$clave   = $rs['clave_usu'];
		$activo  = $rs['activo'];
		$mod01   = $rs['modulo01'];
		$mod02   = $rs['modulo02'];
		$mod03   = $rs['modulo03'];
		$mod04   = $rs['modulo04'];
		$mod05   = $rs['modulo05'];
		$mod06   = $rs['modulo06'];
		$mod07   = $rs['modulo07'];
		$mod08   = $rs['modulo08'];
		$mod09   = $rs['modulo09'];
		$mod10   = $rs['modulo10'];
		$mod11   = $rs['modulo11'];
		$mod12   = $rs['modulo12'];
		$mod13   = $rs['modulo13'];
		$mod14   = $rs['modulo14'];
		$mod15   = $rs['modulo15'];

		// Parametros de la Vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$aTitulos['t4']             = "Modificar Datos";
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['id']                = $id;
		$datos['descrip']           = $descrip;
		$datos['clave']             = $clave;
		$datos['activo']            = $activo;
		$datos['mod01']             = $mod01;
		$datos['mod02']             = $mod02;
		$datos['mod03']             = $mod03;
		$datos['mod04']             = $mod04;
		$datos['mod05']             = $mod05;
		$datos['mod06']             = $mod06;
		$datos['mod07']             = $mod07;
		$datos['mod08']             = $mod08;
		$datos['mod09']             = $mod09;
		$datos['mod10']             = $mod10;
		$datos['mod11']             = $mod11;
		$datos['mod12']             = $mod12;
		$datos['mod13']             = $mod13;
		$datos['mod14']             = $mod14;
		$datos['mod15']             = $mod15;		
		$datos['errorId']           = "";
		$datos['errorDescrip']      = "";
		$datos['errorClave']        = "";
		$datos['errorModulo']       = "";
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];

		// Si tiene permiso de escritura en el modulo 01
		if ($_SESSION['S_MOD01'] == 'E' ) {
			// Salida de la Vista
			$oSalida = new Vista("usuario.modificar.php",$datos);
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}
	}

	// Modificar2
	function regrabar() {

		require_once"clases/classVista.php";
		require_once"clases/classValidar.php";
		require_once"modelo/modeloUsuario.php";
		// Conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";

		// Lectura de datos del formulario
		foreach ($_POST as $datoRecibido => $valor) {
			// El $$ no es un error, va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}

		/******************************************/
		// Pruebas aqui
		//echo "Id: ".$id." - Clave: ".$clave;
		// Verificar si hay errores en las validaciones
		$oValida = new Validar();
		$valores = $oValida->validaUsuario($datos);

		// Parametros de la Vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$aTitulos['t4']             = "Modificar usuario";
		$valores['aTitulos']        = $aTitulos;
		$valores['aNomMod']			= $aNomMod;

		$id                = $valores['id'];
		$descrip           = $valores['descrip'];
		$clave             = $valores['clave'];
		$activo            = $valores['activo'];
		$mod01             = $valores['mod01'];
		$mod02             = $valores['mod02'];
		$mod03             = $valores['mod03'];
		$mod04             = $valores['mod04'];
		$mod05             = $valores['mod05'];
		$mod06             = $valores['mod06'];
		$mod07             = $valores['mod07'];
		$mod08             = $valores['mod08'];
		$mod09             = $valores['mod09'];
		$mod10             = $valores['mod10'];
		$mod11             = $valores['mod11'];
		$mod12             = $valores['mod12'];
		$mod13             = $valores['mod13'];
		$mod14             = $valores['mod14'];
		$mod15             = $valores['mod15'];

		session_start();
		$valores['userNombre']        = $_SESSION['nombreSesion'];		
		$valores['S_MOD01']           = $_SESSION['S_MOD01'];

		// Pruebas aqui
		//echo "errorClave: ".$errorClave." - valores[Clave]: ".$valores['clave']." - Clave: ".$clave;

		// Si tiene permiso de escritura en el modulo 01
		if ($valores['S_MOD01'] == 'E' ) {
			// Salida de la Vista
			// Verificar si hay errores en las validaciones
			if ($valores['error'] > 0) {
				// Salida de la Vista
				$oSalida = new Vista("usuario.modificar.php",$valores);
			} else {
				// Modificar datos en la tabla				
				$oUsuario = new modeloUsuario();
				if($clave != '**********') {
					$oUsuario->modificar($idM,$descrip,$clave,$activo,$mod01,$mod02,$mod03,$mod04,$mod05,$mod06,$mod07,$mod08,$mod09,$mod10,$mod11,$mod12,$mod13,$mod14,$mod15);
				} else {
					$oUsuario->modificar2($idM,$descrip,$activo,$mod01,$mod02,$mod03,$mod04,$mod05,$mod06,$mod07,$mod08,$mod09,$mod10,$mod11,$mod12,$mod13,$mod14,$mod15);
				}
				// Salida de la Vista
				$oSalida = new Vista("usuario.modificar.ok.php",$valores); 
			}
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$valores); 
		}
	}

	// Eliminar
	function eliminar() {

		require_once"clases/classVista.php";
		require_once"modelo/modeloUsuario.php";
		// Conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";

		// Lectura del ID del formulario
		foreach ($_GET as $datoRecibido => $valor) {
			// El $$ no es un error, va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}

		//Leer el registro a eliminar
		$oUsuario = new modeloUsuario();
		$rs = $oUsuario->obtenerDatos($id);

		//while ($rs) //($rows = $rs) 
		//{
			$descrip = $rs['descrip_usu'];
			$clave   = $rs['clave_usu'];
			$activo  = $rs['activo'];
			$mod01   = $rs['modulo01'];
			$mod02   = $rs['modulo02'];
			$mod03   = $rs['modulo03'];
			$mod04   = $rs['modulo04'];
			$mod05   = $rs['modulo05'];
			$mod06   = $rs['modulo06'];
			$mod07   = $rs['modulo07'];
			$mod08   = $rs['modulo08'];
			$mod09   = $rs['modulo09'];
			$mod10   = $rs['modulo10'];
			$mod11   = $rs['modulo11'];
			$mod12   = $rs['modulo12'];
			$mod13   = $rs['modulo13'];
			$mod14   = $rs['modulo14'];
			$mod15   = $rs['modulo15'];
		//}

		// Parametros de la Vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$aTitulos['t4']             = "Esta seguro de querer borrar este usuario?";
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['id']                = $id;
		$datos['descrip']           = $descrip;
		$datos['clave']             = $clave;
		$datos['activo']            = $activo;
		$datos['mod01']             = $mod01;
		$datos['mod02']             = $mod02;
		$datos['mod03']             = $mod03;
		$datos['mod04']             = $mod04;
		$datos['mod05']             = $mod05;
		$datos['mod06']             = $mod06;
		$datos['mod07']             = $mod07;
		$datos['mod08']             = $mod08;
		$datos['mod09']             = $mod09;
		$datos['mod10']             = $mod10;
		$datos['mod11']             = $mod11;
		$datos['mod12']             = $mod12;
		$datos['mod13']             = $mod13;
		$datos['mod14']             = $mod14;
		$datos['mod15']             = $mod15;
		$datos['errorId']           = "";
		$datos['errorDescrip']      = "";
		$datos['errorClave']        = "";
		$datos['errorModulo']       = "";
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];

		// Si tiene permiso de escritura en el modulo 01
		if ($datos['S_MOD01'] == 'E' ) {
			// Salida de la Vista
			$oSalida = new Vista("usuario.eliminar.php",$datos);  
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}    
	}

	// Eliminar2
	function borrar() {

		require_once"clases/classVista.php";
		require_once"clases/classValidar.php";
		require_once"modelo/modeloUsuario.php";
		// Conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";

		// Lectura de datos del formulario
		foreach ($_POST as $datoRecibido => $valor) {
			// El $$ no es un error, va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}
		//echo "Variable Cedula:".$idB;
		// Modificar datos en la tabla
		$oUsuario = new modeloUsuario();
		$oUsuario->eliminar($idB);

		// Parametros de la Vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$aTitulos['t4']             = "Eliminar Datos";
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['id']				= "";
		$datos['descrip']			= "";
		$datos['clave']				= "";
		$datos['activo']			= "";
		$datos['mod01']             = "";
		$datos['mod02']             = "";
		$datos['mod03']             = "";
		$datos['mod04']             = "";
		$datos['mod05']             = "";
		$datos['mod06']             = "";
		$datos['mod07']             = "";
		$datos['mod08']             = "";
		$datos['mod09']             = "";
		$datos['mod10']             = "";
		$datos['mod11']             = "";
		$datos['mod12']             = "";
		$datos['mod13']             = "";
		$datos['mod14']             = "";
		$datos['mod15']             = "";
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];

		// Si tiene permiso de escritura en el modulo 01
		if ($datos['S_MOD01'] == 'E' ) {
			// Salida de la Vista
			$oSalida = new Vista("usuario.eliminar.ok.php",$datos);
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}
	}

}
?>