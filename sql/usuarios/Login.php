<?php

require '../Conexion.php';
require '../Seleccionar.php';

if (isset($_POST['login'])) {
	$usuario = htmlspecialchars($_POST['usuario']);
	$clave = htmlspecialchars($_POST['clave']);
	$model = new Seleccionar();
	$model->usuario = $usuario;
	$model->clave = $clave;
	$model->login();
	$mensaje = $model->mensaje;
	echo $mensaje;
}

?>