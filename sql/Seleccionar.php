<?php 

class Seleccionar{
	public $usuario;
	public $clave;
	public $mensaje;

	public function login(){
		$model = new Conexion;
		$conexion = $model->conectar();
		$sql = 'SELECT * FROM usuarios WHERE ';
		$sql .='usuario=:usuario AND clave=:clave';
		$consulta = $conexion->prepare($sql);
		$consulta->bindParam(':usuario', $this->usuario, PDO::PARAM_STR);
		$consulta->bindParam(':clave', $this->clave, PDO::PARAM_STR);
		$consulta->execute();
		$total = $consulta->rowCount();
		if ($total == 0) {
			$this->mensaje = "no";
		} else {
			$fila = $consulta->fetch();
			session_start();
			$_SESSION['admin'] = true;
			$_SESSION['id'] = $fila['id'];
			$_SESSION['user'] = $fila['usuario'];
			$_SESSION['tipo'] = $fila['tipo'];
			$_SESSION['estado'] = $fila['estado'];
			if ($_SESSION['estado'] == "Habilitado")
			{
				//Registramos evento en auditoria
				$admin = $_SESSION['user'];
				$accion = "Ingresó al Sistema";
				$referencia = $_SESSION['tipo'];
				date_default_timezone_set("America/Caracas");
				$fehr = date("Y-m-d H:i:s");
				$model = new Conexion;
				$conexion = $model->conectar();
				$sql = "INSERT INTO auditoria (admin, accion, referencia, fehr) VALUES ('$admin', '$accion', '$referencia', '$fehr')";
				$consulta = $conexion->prepare($sql);
				$consulta->execute();
				$this->mensaje = "si";
			}
			else
			{
				$this->mensaje = "fallo";
			}
		}
		
	}
}

 ?>