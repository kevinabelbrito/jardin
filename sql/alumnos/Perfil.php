<?php

if (isset($_GET['id']))
{
	$id = htmlspecialchars($_GET['id']);
	if (!preg_match("/^[0-9]+$/", $id))
	{
		session_destroy();
		header("location:$dominio");
	}
	//DATOS DEL ALUMNO
	$model = new Crud;
	$model->select = "*";
	$model->from = "alumnos";
	$model->condition = "id=$id";
	$model->Read();
	$alumnos = $model->rows;
	foreach ($alumnos as $alum)
	{
	  $nombres = $alum['nombres'];
	  $apellidos = $alum['apellidos'];
	  $fenac = $alum['fenac'];
	  $edad = CalculaEdad($alum['fenac']);
	  $sexo = $alum['sexo'];
	  $peso = $alum['peso'];
	  $talla = $alum['talla'];
	  $nac = $alum['nac'];
	  $lugarnac = $alum['lugarnac'];
	  $feins = $alum['feins'];
	  $cedula = $alum['cedula'];
	  $aula = $alum['aula'];
	  //Datos del aula
	  $seccion = seccion($aula);
	  $grupo = grupo($aula);
	  $turno = turno($aula);
	  $dct = dct($aula);
	  $desde = desde($aula);
	  $hasta = hasta($aula);
	  //Datos del docente
	  $nmb_dct = nmb_dct($dct);
	  $ape_dct = ape_dct($dct);
	  $nac_dct = nac_dct($dct);
	  $ced_dct = ced_dct($dct);
	  $tlf_dct = tlf_dct($dct);
	  //Datos del representante
	  $nom_rp = $alum['nom_rp'];
	  $ape_rp = $alum['ape_rp'];
	  $tlf = $alum['tlf'];
	  $dir = $alum['dir'];
	  $email = $alum['email'];
	  $parent = $alum['parent'];
	}
}

?>