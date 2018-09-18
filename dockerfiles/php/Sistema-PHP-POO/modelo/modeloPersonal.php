<?php


class modeloPersonal {

	private $pdo;

	public function __CONSTRUCT()
	{
		require_once "inc/dbConnect.php";
		try {
			$this->pdo = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	function leerTodo($inicio,$fin)
	{
		try {
			$sql  = "SELECT cedulaPer,nombre,dpto,tlf FROM datosPer LIMIT $inicio,$fin";
			$resultSet = array();
			$stm = $this->pdo->prepare($sql);
			
			$stm->execute();
			$resultSet = $stm->fetchAll(PDO::FETCH_ASSOC);

			return $resultSet;
		
		} catch(Exception $e) {
			die($e->getMessage());
		}
		/*$sql = "SELECT cedulaPer,nombre,dpto,tlf FROM datosPer LIMIT $inicio,$fin";
		$resultSet = mysql_query($sql,$this->idConn);
		return $resultSet;*/
	}

	function obtenerDatos($cedula)
	{
		try {
			$sql = "SELECT * FROM datosPer,clavePer 
				WHERE cedulaPer = ? ";
			$resultSet = array();
			$stm = $this->pdo->prepare($sql);

			$stm->execute(array($cedula));
			$resultSet = $stm->fetch(PDO::FETCH_OBJ);

			return $resultSet;
		
		} catch(Exception $e) {
			die($e->getMessage());
		}
		/*$sql = "SELECT * FROM datosPer,clavePer 
				WHERE cedulaPer = '$cedula' AND clavePer_loginPer = loginPer";
		$resultSet = mysql_query($sql,$this->idConn);
		if($resultSet == false) {
			$mensaje  = 'Consulta 1 fallo: ' . mysql_error() . "\n";
			$mensaje .= 'Cual consulta: ' . $sql;
			echo $mensaje;
			exit();
		} else return $resultSet;*/
	}

	function contarRegistro()
	{
		try {
			$sql = "SELECT * FROM persona";
			$resultSet = array();
			$stm = $this->pdo->prepare($sql);

			$stm->execute();
			$resultSet = $stm->rowCount();

			return $resultSet;

		} catch (Exception $e) {
			die($e->getMessage());
		}
		/*$sql = "SELECT * FROM datosPer"; // WHERE cedulaPer = '$cedula' ";
		$resultSet = mysql_query($sql,$this->idConn);
		return mysql_num_rows($resultSet);*/
	}

	function insertar($cedula,$nombre,$cargo,$dpto,$tlf,$correo,$nivel,$clave)
	{
		$conn   = $this->idConn;
		// Primero verificar que el usuario no exista
		$sql = "SELECT loginPer FROM clavePer WHERE loginPer= '".$cedula."' ";
		$query = mysql_query($sql,$conn);
		$fila = mysql_fetch_assoc($query);
		$num = mysql_num_rows($query);
		if($num > 0) {
			// si el usuario existe devolvemos un error
			return 1;
		} else {
			$clave1 = md5($clave);
			$sql1   = "INSERT INTO clavePer (loginPer,clave,nivelPer) 
							VALUES ('$cedula','$clave1','$nivel')";
			$rs1    = mysql_query($sql1,$conn);
			if($rs1 == false) {
				$mensaje  = 'Consulta 1 fallo: ' . mysql_error() . "\n";
				$mensaje .= 'Cual consulta: ' . $sql1;
				echo $mensaje;
				exit();
			}
			$sql2   = "INSERT INTO datosPer (cedulaPer,nombre,cargo,dpto,tlf,correo,clavePer_loginPer) 
							VALUES ('$cedula','$nombre','$cargo','$dpto','$tlf','$correo','$cedula' )";
			$rs2    = mysql_query($sql2,$conn);
			return 0;
			if($rs2 == false) {
				$mensaje  = 'Consulta 2 fallo: ' . mysql_error() . "\n";
				$mensaje .= 'Cual consulta: ' . $sql2;
				echo $mensaje;
				exit();
			}
		}
	}


	function modificar($cedulaM,$nombre,$cargo,$dpto,$tlf,$correo,$nivel,$clave) 
	{
		//echo $cedulaM;
		$conn = $this->idConn;
		$clave1 = md5($clave);
		$sql1  = "UPDATE datosPer SET nombre='$nombre',cargo='$cargo',dpto='$dpto',tlf='$tlf',correo='$correo'     
					WHERE cedulaPer = '$cedulaM' "; 
		$rs1    = mysql_query($sql1,$conn);
		if($rs1 == false) {
			$mensaje  = 'Consulta 1 fallo: ' . mysql_error() . "\n";
			$mensaje .= 'Cual consulta: ' . $sql1;
			echo $mensaje;
			exit();
		}
		$sql2  = "UPDATE clavePer SET clave='$clave1',nivelPer='$nivel'     
					WHERE loginPer = '$cedulaM' "; 
		$rs2    = mysql_query($sql2,$conn);
		if($rs2 == false) {
			$mensaje  = 'Consulta 2 fallo: ' . mysql_error() . "\n";
			$mensaje .= 'Cual consulta: ' . $sql2;
			echo $mensaje;
			exit();
		}
	}


	function eliminar($cedula) 
	{
		$conn   = $this->idConn;
		$sql1   = "DELETE FROM datosPer WHERE cedulaPer = '$cedula' "; 
		$rs1    = mysql_query($sql1,$conn);
		if($rs1 == false) {
			$mensaje  = 'Consulta 1 fallo: ' . mysql_error() . "\n";
			$mensaje .= 'Cual consulta: ' . $sql1;
			echo $mensaje;
			exit();
		}

		$sql2   = "DELETE FROM clavePer WHERE loginPer = '$cedula' "; 
		$rs2    = mysql_query($sql2,$conn);
		if($rs2 == false) {
			$mensaje  = 'Consulta 2 fallo: ' . mysql_error() . "\n";
			$mensaje .= 'Cual consulta: ' . $sql2;
			echo $mensaje;
			exit();
		}
	}
	 
}

?>
