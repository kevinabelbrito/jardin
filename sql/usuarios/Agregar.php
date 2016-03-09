<?php
require '../Conexion.php';
require '../Crud.php';
if (isset($_POST['add']))
{
	$admin = htmlspecialchars($_POST['admin']);
	$nombres = htmlspecialchars($_POST['nombres']);
	$apellidos = htmlspecialchars($_POST['apellidos']);
	$email = htmlspecialchars($_POST['email']);
	$usuario = htmlspecialchars($_POST['usuario']);
	$clave = htmlspecialchars($_POST['clave']);
	$tipo = htmlspecialchars($_POST['tipo']);
	$preg = htmlspecialchars($_POST['preg']);
	$resp = htmlspecialchars($_POST['resp']);
	//Verificamos si se repite
	$model = new Crud;
	$model->select = "*";
	$model->from = "usuarios";
	$model->condition = "email='$email' OR usuario='$usuario'";
	$model->Read();
	$filas = $model->rows;
	$total = count($filas);
	if ($total > 0)
	{
		echo "El usuario ya se encuentra registrado en la Base de Datos";
	}
	else
	{
		//Agregamos el usuario
		$model = new Crud;
		$model->into = "usuarios";
		$model->columns = "nombres, apellidos, email, usuario, clave, tipo, preg, resp, estado";
		$model->values = "'$nombres', '$apellidos', '$email', '$usuario', '$clave', '$tipo', '$preg', '$resp', 'Habilitado'";
		$model->Create();
		//Agregamos evento en auditoria
		$accion = "Registro de Usuario";
		$referencia = "$nombres $apellidos";
		date_default_timezone_set("America/Caracas");
        $fehr = date("Y-m-d H:i:s");
		$model = new Crud;
		$model->into = "auditoria";
		$model->columns = "admin, accion, referencia, fehr";
		$model->values = "'$admin', '$accion', '$referencia', '$fehr'";
		$model->Create();
		echo "$nombres $apellidos fue agregado al sistema exitosamente";
	}
	
}
?>