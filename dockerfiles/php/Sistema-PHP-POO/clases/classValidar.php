<?php
/**
 * Archivo		: classValidar.php
 * Funcion 		: Validar los datos recibidos para ser procesados
 * 
 */

	class Validar
	{		

		public $data=array();
		// Lista la validacion personal
		function validaUsuario($data)
		{

			if( is_array($data) ) {
				extract($data);
			}
			
			//echo "Cedula: ".$idM." - errorId: ".$errorId.
			//" - Nombre: ".$descrip." - Clave: ".$clave." - Error: ".$error."<br />";
			
			if (!empty($idM)) {
				$id = $idM;
			}
			if (!empty($id)) {
				$idM = $id;
			} 

			if (!empty($clave)) {
				//echo "Datos de Clave: ".$clave."<br />";
				//echo "ClaveM: ".$claveM."<br /><br />";
				$claveM = $clave;	
				//echo "Datos de Clave: ".$clave."<br />";
				//echo "ClaveM: ".$claveM;		
			} 
			if (!empty($claveM)) {
				$clave = $claveM;
			}
			

			// Validar los datos - 
		   $error = 0;
			// Valida id/cedula
			if ($id=="" || $id==" ") {
				$error = 1;
				$errorId = "¡Faltó su Id/Cédula!";
			} else {
				$errorId = "";
			}

			// Valida nombre
			if ($descrip=="" || $descrip==" ") {
				$error = 2;
				$errorDescrip = "¡Faltó su Nombre!";
			} else {
				$errorDescrip = "";
			}

			// Valida clave
			if ($clave=="" || $clave==" ") {
				$error = 3;
				$errorClave = "¡Faltó la Clave!";
			} else {
				$errorClave = "";
			}

			$cuantosM = 0;
			// Valida si hay al menos un modulo permitido
			if (empty($mod01) || $mod01==" " || $mod01=="X") { $cuantosM++;$mod01="X";} //echo " ".$mod01; }
			if (empty($mod02) || $mod02==" " || $mod02=="X") { $cuantosM++;$mod02="X";} //echo " ".$mod02; }
			if (empty($mod03) || $mod03==" " || $mod03=="X") { $cuantosM++;$mod03="X";} //echo " ".$mod03; }
			if (empty($mod04) || $mod04==" " || $mod04=="X") { $cuantosM++;$mod04="X";} //echo " ".$mod04; }
			if (empty($mod05) || $mod05==" " || $mod05=="X") { $cuantosM++;$mod05="X";} //echo " ".$mod05; }
			if (empty($mod06) || $mod06==" " || $mod06=="X") { $cuantosM++;$mod06="X";} //echo " ".$mod06; }
			if (empty($mod07) || $mod07==" " || $mod07=="X") { $cuantosM++;$mod07="X";} //echo " ".$mod07; }
			if (empty($mod08) || $mod08==" " || $mod08=="X") { $cuantosM++;$mod08="X";} //echo " ".$mod08; }
			if (empty($mod09) || $mod09==" " || $mod09=="X") { $cuantosM++;$mod09="X";} //echo " ".$mod09; }
			if (empty($mod10) || $mod10==" " || $mod10=="X") { $cuantosM++;$mod10="X";} //echo " ".$mod10; }
			if (empty($mod11) || $mod11==" " || $mod11=="X") { $cuantosM++;$mod11="X";} //echo " ".$mod11; }
			if (empty($mod12) || $mod12==" " || $mod12=="X") { $cuantosM++;$mod12="X";} //echo " ".$mod12; }
			if (empty($mod13) || $mod13==" " || $mod13=="X") { $cuantosM++;$mod13="X";} //echo " ".$mod13; }
			if (empty($mod14) || $mod14==" " || $mod14=="X") { $cuantosM++;$mod14="X";} //echo " ".$mod14; }
			if (empty($mod15) || $mod15==" " || $mod15=="X") { $cuantosM++;$mod15="X";} //echo " ".$mod15; }
			if ($cuantosM == 15) {
				$error = 4;
				$errorModulo = "¡Debe tener acceso al menos a 01 módulo!";
			} else {
				$errorModulo = "";
			}
			
			//echo "Cedula: ".$idM." - errorId: ".$errorId.
			//" - Nombre: ".$descrip." - Clave: ".$clave." - ErrorModulo: ".$errorModulo." - Error: ".$error."<br />";

			$data['id']       		  = $id;
			$data['descrip']       	  = $descrip;
			$data['clave']        	  = $clave;
			$data['activo']        	  = $activo;
			$data['mod01']            = $mod01;
			$data['mod02']            = $mod02;
			$data['mod03']            = $mod03;
			$data['mod04']            = $mod04;
			$data['mod05']            = $mod05;
			$data['mod06']            = $mod06;
			$data['mod07']            = $mod07;
			$data['mod08']            = $mod08;
			$data['mod09']            = $mod09;
			$data['mod10']            = $mod10;
			$data['mod11']            = $mod11;
			$data['mod12']            = $mod12;
			$data['mod13']            = $mod13;
			$data['mod14']            = $mod14;
			$data['mod15']            = $mod15;

			$data['errorId']				= $errorId;
			$data['errorDescrip']		= $errorDescrip;
			$data['errorClave']			= $errorClave;
			$data['errorModulo']			= $errorModulo;

			$data['error']					= $error;
			return $data;
		}

	}
?>