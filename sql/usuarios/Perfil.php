<?php

if (isset($_GET['id']))
{
	$id = htmlspecialchars($_GET['id']);
	if (!preg_match("/^[0-9]+$/", $id))
	{
		session_destroy();
		header("location:$dominio");
	}
	else
	{
		$model = new Crud();
		$model->select = "*";
		$model->from = "usuarios";
		$model->condition = "id=$id";
		$model->Read();
		$filas = $model->rows;
		foreach ($filas as $fila)
		{
			$id = $fila['id'];
			$nombres = $fila['nombres'];
			$apellidos = $fila['apellidos'];
			$email = $fila['email'];
			$usuario = $fila['usuario'];
			$clave = $fila['clave'];
			$tipo = $fila['tipo'];
			$preg = $fila['preg'];
			$resp = $fila['resp'];
			$estado = $fila['estado'];
		}
	}
	
}
?>