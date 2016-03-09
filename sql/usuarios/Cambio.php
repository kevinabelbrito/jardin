<?php

require '../Conexion.php';
require '../Crud.php';

if (isset($_POST['cambio']))
{
	$clave = htmlspecialchars($_POST['clave']);
	$nueva = htmlspecialchars($_POST['nueva']);
	$id = htmlspecialchars($_POST['id']);
	$admin = htmlspecialchars($_POST['admin']);
	//Verificamos que la contraseña vigente sea correcta
	$model = new Crud;
	$model->select = "*";
	$model->from = "usuarios";
	$model->condition = "id=$id AND clave='$clave'";
	$model->Read();
	$clave = $model->rows;
	$total = count($clave);
	if ($total == 0)
	{
		echo "No introduciste tu contraseña actual correctamente, no se pudo realizar el cambio";
	}
	else
	{
		//Cargamos los nombres y apellidos
		foreach ($clave as $fila){
			$nombres = $fila['nombres'];
			$apellidos = $fila['apellidos'];
		}
		//Cambiamos la contraseña
		$model = new Crud;
		$model->update = "usuarios";
		$model->set = "clave='$nueva'";
		$model->condition = "id=$id";
		$model->Update();
		echo "Su contraseña fue cambiada exitosamente";
		//Agregamos evento en auditoria
		$accion = "Cambio de Clave";
		$referencia = "$nombres $apellidos";
		date_default_timezone_set("America/Caracas");
	    $fehr = date("Y-m-d H:i:s");
		$model = new Crud;
		$model->into = "auditoria";
		$model->columns = "admin, accion, referencia, fehr";
		$model->values = "'$admin', '$accion', '$referencia', '$fehr'";
		$model->Create();
	}
	
}

?>