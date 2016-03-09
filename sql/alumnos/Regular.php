<?php

require '../../sql/Conexion.php';
require '../../sql/Crud.php';
require '../../sql/Funciones.php';

if (isset($_GET['cedula'])){
	$cedula = htmlspecialchars($_GET['cedula']);
	$alumnos = new stdClass();
	//Verificamos si existe el alumno
	$model = new Crud;
	$model->select = "*";
	$model->from = "alumnos";
	$model->condition = "cedula='$cedula'";
	$model->Read();
	$filas = $model->rows;
	$total = count($filas);
	if ($total > 0)
	{
		//Cargamos los datos del alumno
		foreach ($filas as $fila)
		{
			$nombres = $fila['nombres'];
			$apellidos = $fila['apellidos'];
			$fenac = date("d-m-Y", strtotime($fila['fenac']));
			$sexo = $fila['sexo'];
			$nac = $fila['nac'];
			$lugarnac = $fila['lugarnac'];
			$feins = date("d-m-Y", strtotime($fila['feins']));
		}
		//Cargando los años que el alumno ha cursado
		$model = new Crud;
		$model->select = "*";
		$model->from = "historial";
		$model->condition = "ced_alu='$cedula'";
		$model->Read();
		$aulas = $model->rows;
		$totales = count($aulas);
		if ($totales > 0)
		{
			$table = "<table class='list' border='1'>
			<thead>
				<tr>
					<th colspan='4'>Historial de Inscripciones del Alumno</th>
				</tr>
				<tr>
					<th>Seccion</th>
					<th>Grupo</th>
					<th>Turno</th>
					<th>Periodo</th>
				</tr>
			</thead>
			<tbody>";
			foreach ($aulas as $aula)
			{
				$table .= "<tr>
				<td>".seccion($aula['aula'])."</td>
				<td>".grupo($aula['aula'])."</td>
				<td>".turno($aula['aula'])."</td>
				<td>".desde($aula['aula'])."-".hasta($aula['aula'])."</td>
				</tr>";
			}
			$table .= "</tbody></table>";
		}
		else
		{
			$table = "<h2>El alumno no tiene historial de Inscripciones</h2>";
		}
		//Datos del Alumno
		$alumnos->nombres = $nombres;
		$alumnos->apellidos = $apellidos;
		$alumnos->fenac = $fenac;
		$alumnos->sexo = $sexo;
		$alumnos->nac = $nac;
		$alumnos->lugarnac = $lugarnac;
		$alumnos->feins = $feins;
		$alumnos->cedula = $cedula;
		$alumnos->historial = $table;
		$json = json_encode($alumnos);
		echo $json;
	}
	else
	{
		$alumnos->failed = "fallo";
		$json = json_encode($alumnos);
		echo $json;
	}
	
}

if (isset($_POST['aula'])){
	$admin = htmlspecialchars($_POST['admin']);
	$aula = htmlspecialchars($_POST['aula']);
	$ced_alu = htmlspecialchars($_POST['ced_alu']);
	$feins = date("Y-m-d");
	//Actualizamos el aula quedando el alumno reinscrito en la misma
	$model = new Crud;
	$model->update = "alumnos";
	$model->set = "feins='$feins', aula=$aula";
	$model->condition = "cedula='$ced_alu'";
	$model->Update();
	//Historial de aulas
	$model = new Crud;
	$model->into = "historial";
	$model->columns = "ced_alu, aula";
	$model->values = "'$ced_alu', $aula";
	$model->Create();
	//Agregamos evento en auditoria
	$accion = "Inscripción de Alumno Regular";
	$referencia = "C.E.: $ced_alu";
	date_default_timezone_set("America/Caracas");
    $fehr = date("Y-m-d H:i:s");
	$model = new Crud;
	$model->into = "auditoria";
	$model->columns = "admin, accion, referencia, fehr";
	$model->values = "'$admin', '$accion', '$referencia', '$fehr'";
	$model->Create();
	//Enviamos respuesta del servidor al cliente
	echo "$ced_alu fue reinscripto exitosamente";
}

?>