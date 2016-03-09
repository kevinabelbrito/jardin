<?php 

class Conexion{
	public function conectar(){
		$user = "root";
		$password = "kevin";
		$host = "localhost";
		$dbname = "jardin";
return $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	}
}

?>