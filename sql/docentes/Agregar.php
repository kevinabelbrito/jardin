<?php
require '../Conexion.php';
require '../Crud.php';
if (isset($_POST['add']))
{
	$admin = htmlspecialchars($_POST['admin']);
	$nombres = htmlspecialchars($_POST['nombres']);
	$apellidos = htmlspecialchars($_POST['apellidos']);
	$nac = htmlspecialchars($_POST['nac']);
	$cedula = htmlspecialchars($_POST['cedula']);
	$tlf = htmlspecialchars($_POST['tlf']);
	//Verificamos si se repite
	$model = new Crud;
	$model->select = "*";
	$model->from = "docentes";
	$model->condition = "nac='$nac' AND cedula='$cedula'";
	$model->Read();
	$filas = $model->rows;
	$total = count($filas);
	if ($total > 0)
	{
		echo "El docente ya se encuentra registrado en la Base de Datos";
	}
	else
	{
		//Agregamos el usuario
		$model = new Crud;
		$model->into = "docentes";
		$model->columns = "nombres, apellidos, nac, cedula, tlf";
		$model->values = "'$nombres', '$apellidos', '$nac', '$cedula', '$tlf'";
		$model->Create();
		//Agregamos evento en auditoria
		$accion = "Registro de Docente";
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