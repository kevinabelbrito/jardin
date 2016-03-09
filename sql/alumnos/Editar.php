<?php

require '../Conexion.php';
require '../Crud.php';

if (isset($_POST['act']))
{
	//Administrador que realiza la inscripción
	$admin = htmlspecialchars($_POST['admin']);
	$id = htmlspecialchars($_POST['id']);
	//Datos de Alumno
	$nombres = htmlspecialchars($_POST['nombres']);
	$apellidos = htmlspecialchars($_POST['apellidos']);
	$fenac = htmlspecialchars($_POST['fenac']);
	$sexo = htmlspecialchars($_POST['sexo']);
	$peso = htmlspecialchars($_POST['peso']);
	$talla = htmlspecialchars($_POST['talla']);
	$nac = htmlspecialchars($_POST['nac']);
	$lugarnac = htmlspecialchars($_POST['lugarnac']);
	//Datos del representante
	$nom_rp = htmlspecialchars($_POST['nom_rp']);
	$ape_rp = htmlspecialchars($_POST['ape_rp']);
	$tlf_rp = htmlspecialchars($_POST['tlf_rp']);
	$dir_rp = htmlspecialchars($_POST['dir_rp']);
	$email_rp = htmlspecialchars($_POST['email_rp']);
	$parent_rp = htmlspecialchars($_POST['parent_rp']);
	//Agregamos el usuario
	$model = new Crud;
	$model->update = "alumnos";
	$model->set = "nombres='$nombres', apellidos='$apellidos', fenac='$fenac', sexo='$sexo', peso='$peso', talla='$talla', nac='$nac', lugarnac='$lugarnac', nom_rp='$nom_rp', ape_rp='$ape_rp', tlf='$tlf_rp', dir='$dir_rp', email='$email_rp', parent='$parent_rp'";
	$model->condition = "id=$id";
	$model->Update();
	//Agregamos evento en auditoria
	$accion = "Actualización de Alumno";
	$referencia = "$nombres $apellidos";
	date_default_timezone_set("America/Caracas");
    $fehr = date("Y-m-d H:i:s");
	$model = new Crud;
	$model->into = "auditoria";
	$model->columns = "admin, accion, referencia, fehr";
	$model->values = "'$admin', '$accion', '$referencia', '$fehr'";
	$model->Create();
	echo "Los datos del alumno fueron actualizados exitosamente";
}

?>