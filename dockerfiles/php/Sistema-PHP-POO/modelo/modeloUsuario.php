<?php

class modeloUsuario {

	private $pdo;

	public function __CONSTRUCT()
	{
		require_once "inc/dbConnect.php";
		try {
			$this->pdo = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(Exception $e) {
			echo "Error de conexion con " . $hostname . "<br />";
			echo "usando al usuario " . $username . "<br />";
			die($e->getMessage());
		}
	}

	function leerTodo($inicio,$fin)
	{
		try {
			$sql  = "SELECT * FROM usuario LIMIT $inicio,$fin";
			$resultSet = array();
			$stm = $this->pdo->prepare($sql);
			
			$stm->execute();
			$resultSet = $stm->fetchAll(PDO::FETCH_ASSOC);

			return $resultSet;
		
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	function obtenerDatos($id)
	{
		try {
			$sql = "SELECT * FROM usuario WHERE id_usu = ? ";
			$resultSet = array();
			$stm = $this->pdo->prepare($sql);

			$stm->execute(array($id));
			$resultSet = $stm->fetch(PDO::FETCH_ASSOC);

			return $resultSet;
		
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	function obtenerLogin($id)
	{ 
		try {
			$sql = "SELECT * FROM usuario WHERE id_usu = ? ";
			$resultSet = array();
			$stm = $this->pdo->prepare($sql);

			$stm->execute(array($id));
			$resultSet = $stm->fetch(PDO::FETCH_ASSOC);

			return $resultSet;
		
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}


	function obtenerLoginClave($id,$clave)
	{		
		try {
			$MD5clave =  MD5($clave);
			$sql = "SELECT * FROM usuario WHERE id_usu = ? AND clave_usu = ? ";
			$resultSet = array();
			$stm = $this->pdo->prepare($sql);

			$stm->execute([$id,$MD5clave]);
			$resultSet = $stm->fetch(PDO::FETCH_ASSOC); //->fetch(PDO::FETCH_OBJ);

			return $resultSet;

		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	function contarRegistro()
	{
		try {
			$sql = "SELECT * FROM usuario";
			$resultSet = array();
			$stm = $this->pdo->prepare($sql);

			$stm->execute();
			$resultSet = $stm->rowCount();

			return $resultSet;

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
	function modificar($id,$nombre,$clave,$activo,$mod01,$mod02,$mod03,$mod04,$mod05,$mod06,$mod07,$mod08,$mod09,$mod10,$mod11,$mod12,$mod13,$mod14,$mod15) 
	{
		try {
			$MD5clave = md5($clave);
			$sql  = "UPDATE usuario SET 
					descrip_usu=?,clave_usu=?,activo=?,
					modulo01=?, modulo02=?, modulo03=?,
					modulo04=?, modulo05=?, modulo06=?,
					modulo07=?, modulo08=?, modulo09=?,
					modulo10=?, modulo11=?, modulo12=?,
					modulo13=?, modulo14=?, modulo15=?
					WHERE id_usu = ? "; 

			$stm = $this->pdo->prepare($sql);
			$resultSet = $stm->execute([$nombre,$MD5clave,$activo,$mod01,$mod02,$mod03,$mod04,$mod05,$mod06,$mod07,$mod08,$mod09,$mod10,$mod11,$mod12,$mod13,$mod14,$mod15,$id]);
		
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}
	function modificar2($id,$nombre,$activo,$mod01,$mod02,$mod03,$mod04,$mod05,$mod06,$mod07,$mod08,$mod09,$mod10,$mod11,$mod12,$mod13,$mod14,$mod15) 
	{
		try {
			$MD5clave = md5($clave);
			$sql  = "UPDATE usuario SET 
					descrip_usu=?,clave_usu=?,activo=?,
					modulo01=?, modulo02=?, modulo03=?,
					modulo04=?, modulo05=?, modulo06=?,
					modulo07=?, modulo08=?, modulo09=?,
					modulo10=?, modulo11=?, modulo12=?,
					modulo13=?, modulo14=?, modulo15=?
					WHERE id_usu = ? "; 

			$stm = $this->pdo->prepare($sql);
			$resultSet = $stm->execute([$nombre,$MD5clave,$activo,$mod01,$mod02,$mod03,$mod04,$mod05,$mod06,$mod07,$mod08,$mod09,$mod10,$mod11,$mod12,$mod13,$mod14,$mod15,$id]);
		
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	function insertar($id,$nombre,$clave,$activo,$mod01,$mod02,$mod03,$mod04,$mod05,$mod06,$mod07,$mod08,$mod09,$mod10,$mod11,$mod12,$mod13,$mod14,$mod15) 
	{
		try {
			$MD5clave = md5($clave);
			$sql  = "INSERT INTO usuario (id_usu,descrip_usu,clave_usu,activo,
					modulo01, modulo02, modulo03,modulo04, modulo05, modulo06,
					modulo07, modulo08, modulo09,modulo10, modulo11, modulo12,
					modulo13, modulo14, modulo15) VALUES (?,?,?,?,
					?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";
			$stm = $this->pdo->prepare($sql);
			$resultSet = $stm->execute([$id,$nombre,$MD5clave,$activo,$mod01,$mod02,$mod03,$mod04,$mod05,$mod06,$mod07,$mod08,$mod09,$mod10,$mod11,$mod12,$mod13,$mod14,$mod15]);
		
			return $resultSet;
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	function eliminar($id) 
	{
		try {
			$sql = "DELETE FROM usuario WHERE id_usu = ?";
			$resultSet = array();
			$resultSet = $this->pdo->prepare($sql);			          

			$resultSet->execute(array([$id]));

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
	
}
?>
