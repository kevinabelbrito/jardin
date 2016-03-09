<?php
require '../Conexion.php';
require '../Crud.php';
if (isset($_POST['add']))
{
	$admin = htmlspecialchars($_POST['admin']);
	$id = htmlspecialchars($_POST['id']);
	$nombres = htmlspecialchars($_POST['nombres']);
	$apellidos = htmlspecialchars($_POST['apellidos']);
	$nac = htmlspecialchars($_POST['nac']);
	$cedula = htmlspecialchars($_POST['cedula']);
	$tlf = htmlspecialchars($_POST['tlf']);
	//Agregamos el usuario
	$model = new Crud;
	$model->update = "docentes";
	$model->set = "nombres='$nombres', apellidos='$apellidos', nac='$nac', cedula='$cedula', tlf='$tlf'";
	$model->condition = "id=$id";
	$model->Update();
	//Agregamos evento en auditoria
	$accion = "Actualización de Docente";
	$referencia = "$nombres $apellidos";
	date_default_timezone_set("America/Caracas");
    $fehr = date("Y-m-d H:i:s");
	$model = new Crud;
	$model->into = "auditoria";
	$model->columns = "admin, accion, referencia, fehr";
	$model->values = "'$admin', '$accion', '$referencia', '$fehr'";
	$model->Create();
	echo "Los datos del docente fueron actualizados exitosamente";
}
?>