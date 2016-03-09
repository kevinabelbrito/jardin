<?php

function CalculaEdad($fecha)
{
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}

function nmb_dct($identificador)
{
	$model = new Crud;
	$model->select = "nombres";
	$model->from = "docentes";
	$model->condition = "id=$identificador";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$nombres = $fila['nombres'];
	}
	return $nombres;
}

function ape_dct($identificador)
{
	$model = new Crud;
	$model->select = "apellidos";
	$model->from = "docentes";
	$model->condition = "id=$identificador";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$apellidos = $fila['apellidos'];
	}
	return $apellidos;
}

function nac_dct($identificador)
{
	$model = new Crud;
	$model->select = "nac";
	$model->from = "docentes";
	$model->condition = "id=$identificador";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$nac = $fila['nac'];
	}
	return $nac;
}

function ced_dct($identificador)
{
	$model = new Crud;
	$model->select = "cedula";
	$model->from = "docentes";
	$model->condition = "id=$identificador";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$cedula = $fila['cedula'];
	}
	return $cedula;
}

function tlf_dct($identificador)
{
	$model = new Crud;
	$model->select = "tlf";
	$model->from = "docentes";
	$model->condition = "id=$identificador";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$tlf = $fila['tlf'];
	}
	return $tlf;
}

function seccion($identificador)
{
	$model = new Crud;
	$model->select = "seccion";
	$model->from = "aulas";
	$model->condition = "id=$identificador";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$seccion = $fila['seccion'];
	}
	return $seccion;
}

function grupo($identificador)
{
	$model = new Crud;
	$model->select = "grupo";
	$model->from = "aulas";
	$model->condition = "id=$identificador";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$grupo = $fila['grupo'];
	}
	return $grupo;
}

function turno($identificador)
{
	$model = new Crud;
	$model->select = "turno";
	$model->from = "aulas";
	$model->condition = "id=$identificador";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$turno = $fila['turno'];
	}
	return $turno;
}

function dct($identificador)
{
	$model = new Crud;
	$model->select = "dct";
	$model->from = "aulas";
	$model->condition = "id=$identificador";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$dct = $fila['dct'];
	}
	return $dct;
}

function desde($identificador)
{
	$model = new Crud;
	$model->select = "desde";
	$model->from = "aulas";
	$model->condition = "id=$identificador";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$desde = $fila['desde'];
	}
	return $desde;
}

function hasta($identificador)
{
	$model = new Crud;
	$model->select = "hasta";
	$model->from = "aulas";
	$model->condition = "id=$identificador";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$hasta = $fila['hasta'];
	}
	return $hasta;
}

function nmb_alu($identificador)
{
	$model = new Crud;
	$model->select = "nombres";
	$model->from = "alumnos";
	$model->condition = "id=$identificador";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$nombres = $fila['nombres'];
	}
	return $nombres;
}

function ape_alu($identificador)
{
	$model = new Crud;
	$model->select = "apellidos";
	$model->from = "alumnos";
	$model->condition = "id=$identificador";
	$model->Read();
	$filas = $model->rows;
	foreach ($filas as $fila)
	{
		$apellidos = $fila['apellidos'];
	}
	return $apellidos;
}

?>