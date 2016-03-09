<?php
require '../Conexion.php';
require '../Crud.php';
if (isset($_POST['add']))
{
	$admin = htmlspecialchars($_POST['admin']);
	$seccion = htmlspecialchars($_POST['seccion']);
	$grupo = htmlspecialchars($_POST['grupo']);
	$turno = htmlspecialchars($_POST['turno']);
	$dct = htmlspecialchars($_POST['dct']);
	$desde = htmlspecialchars($_POST['desde']);
	$hasta = $desde + 1;
	//Verificamos si se repite
	$model = new Crud;
	$model->select = "*";
	$model->from = "aulas";
	$model->condition = "turno='$turno' AND dct=$dct AND desde=$desde AND hasta=$hasta OR seccion='$seccion' AND grupo='$grupo' AND turno='$turno' AND desde='$desde' AND hasta='$hasta'";
	$model->Read();
	$filas = $model->rows;
	$total = count($filas);
	if ($total > 0)
	{
		echo "No se pudo registrar el aula, verifique que no este registrada previamente el aula o el docente ya tiene un aula asignada en ese turno";
	}
	else
	{
		//Agregamos el Aula
		$model = new Crud;
		$model->into = "aulas";
		$model->columns = "seccion, grupo, turno, dct, desde, hasta";
		$model->values = "'$seccion', '$grupo', '$turno', $dct, '$desde', '$hasta'";
		$model->Create();
		//Agregamos evento en auditoria
		$accion = "Registro de Aula";
		$referencia = "Seccion:$seccion | Grupo:$grupo | Turno:$turno | Periodo:$desde-$hasta";
		date_default_timezone_set("America/Caracas");
        $fehr = date("Y-m-d H:i:s");
		$model = new Crud;
		$model->into = "auditoria";
		$model->columns = "admin, accion, referencia, fehr";
		$model->values = "'$admin', '$accion', '$referencia', '$fehr'";
		$model->Create();
		echo "El aula fue registrada exitosamente";
	}
	
}
?>