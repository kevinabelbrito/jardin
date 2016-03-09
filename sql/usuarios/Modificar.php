<?php
require '../Conexion.php';
require '../Crud.php';
if (isset($_POST['act']))
{
	$admin = htmlspecialchars($_POST['admin']);
	$id = htmlspecialchars($_POST['id']);
	$nombres = htmlspecialchars($_POST['nombres']);
	$apellidos = htmlspecialchars($_POST['apellidos']);
	$email = htmlspecialchars($_POST['email']);
	$usuario = htmlspecialchars($_POST['usuario']);
	$preg = htmlspecialchars($_POST['preg']);
	$resp = htmlspecialchars($_POST['resp']);
	//Editamos el usuario
	$model = new Crud;
	$model->update = "usuarios";
	$model->set = "nombres='$nombres', apellidos='$apellidos', email='$email', usuario='$usuario', preg='$preg', resp='$resp'";
	$model->condition = "id=$id";
	$model->Update();
	//Agregamos evento en auditoria
	$accion = "Actualización de datos";
	$referencia = "$nombres $apellidos";
	date_default_timezone_set("America/Caracas");
    $fehr = date("Y-m-d H:i:s");
	$model = new Crud;
	$model->into = "auditoria";
	$model->columns = "admin, accion, referencia, fehr";
	$model->values = "'$admin', '$accion', '$referencia', '$fehr'";
	$model->Create();
	echo "Los datos fueron actualizados exitosamente";
}
?>