<?php

require '../Conexion.php';
require '../Crud.php';

if (isset($_POST['recuperar']))
{
	$email = htmlspecialchars($_POST['email']);
	$preg = htmlspecialchars($_POST['preg']);
	$resp = htmlspecialchars($_POST['resp']);
	$model = new Crud;
	$model->select = "*";
	$model->from = "usuarios";
	$model->condition = "email='$email' AND preg='$preg' AND resp='$resp'";
	$model->Read();
	$filas = $model->rows;
	$total = count($filas);
	if ($total == 0)
	{
		echo "Ocurrio un error al recuperar la contraseña, verifique sus datos e intente de nuevo";
	}
	else
	{
		foreach ($filas as $fila)
		{
			$email = $fila['email'];
			$usuario = $fila['usuario'];
			$clave = $fila['clave'];
		}
		echo "Usuario: $usuario | Contraseña: $clave";
	}
	
}

?>