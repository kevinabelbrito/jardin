<?php
require '../Conexion.php';
require '../Crud.php';
if (isset($_POST['add']))
{
	//Administrador que realiza la inscripción
	$admin = htmlspecialchars($_POST['admin']);
	//Datos de Alumno
	$nombres = htmlspecialchars($_POST['nombres']);
	$apellidos = htmlspecialchars($_POST['apellidos']);
	$fenac = htmlspecialchars($_POST['fenac']);
	$sexo = htmlspecialchars($_POST['sexo']);
	$peso = htmlspecialchars($_POST['peso']);
	$talla = htmlspecialchars($_POST['talla']);
	$nac = htmlspecialchars($_POST['nac']);
	$lugarnac = htmlspecialchars($_POST['lugarnac']);
	$feins = date("Y-m-d");
	//Datos de la sección
	$cedula = htmlspecialchars($_POST['cedula']);
	$aula = htmlspecialchars($_POST['aula']);
	//Datos del representante
	$nom_rp = htmlspecialchars($_POST['nom_rp']);
	$ape_rp = htmlspecialchars($_POST['ape_rp']);
	$tlf_rp = htmlspecialchars($_POST['tlf_rp']);
	$dir_rp = htmlspecialchars($_POST['dir_rp']);
	$email_rp = htmlspecialchars($_POST['email_rp']);
	$parent_rp = htmlspecialchars($_POST['parent_rp']);
	//Verificamos si se repite el alumno
	$model = new Crud;
	$model->select = "*";
	$model->from = "alumnos";
	$model->condition = "cedula='$cedula'";
	$model->Read();
	$filas = $model->rows;
	$total = count($filas);
	if ($total > 0)
	{
		echo "El alumno ya se encuentra registrado en la Base de Datos";
	}
	else
	{
		//Agregamos el usuario
		$model = new Crud;
		$model->into = "alumnos";
		$model->columns = "nombres, apellidos, fenac, sexo, peso, talla, nac, lugarnac, cedula, aula, nom_rp, ape_rp, tlf, dir, email, parent, feins";
		$model->values = "'$nombres', '$apellidos', '$fenac', '$sexo', '$peso', '$talla', '$nac', '$lugarnac', '$cedula', $aula, '$nom_rp', '$ape_rp', '$tlf_rp', '$dir_rp', '$email_rp', '$parent_rp', '$feins'";
		$model->Create();
		//Datos de la Madre
		$nom_ma = htmlspecialchars($_POST['nom_ma']);
		$ape_ma = htmlspecialchars($_POST['ape_ma']);
		$ced_ma = htmlspecialchars($_POST['ced_ma']);
		$nac_ma = htmlspecialchars($_POST['nac_ma']);
		$ec_ma = htmlspecialchars($_POST['ec_ma']);
		$tlf_ma = htmlspecialchars($_POST['tlf_ma']);
		$ocp_ma = htmlspecialchars($_POST['ocp_ma']);
		$ingreso_ma = htmlspecialchars($_POST['ingreso_ma']);
		$dir_ma = htmlspecialchars($_POST['dir_ma']);
		$email_ma = htmlspecialchars($_POST['email_ma']);
		//Agregamos los datos de la madre
		$model = new Crud;
		$model->into = "madres";
		$model->columns = "ced_alu, nombres, apellidos, cedula, nac, ec, tlf, ocp, ingreso, dir, email";
		$model->values = "'$cedula', '$nom_ma', '$ape_ma', '$ced_ma', '$nac_ma', '$ec_ma', '$tlf_ma', '$ocp_ma', '$ingreso_ma', '$dir_ma', '$email_ma'";
		$model->Create();
		//Datos del padre
		$nom_pa = htmlspecialchars($_POST['nom_pd']);
		$ape_pa = htmlspecialchars($_POST['ape_pd']);
		$ced_pa = htmlspecialchars($_POST['ced_pd']);
		$nac_pa = htmlspecialchars($_POST['nac_pd']);
		$ec_pa = htmlspecialchars($_POST['ec_pd']);
		$tlf_pa = htmlspecialchars($_POST['tlf_pd']);
		$ocp_pa = htmlspecialchars($_POST['ocp_pd']);
		$ingreso_pa = htmlspecialchars($_POST['ingreso_pd']);
		$dir_pa = htmlspecialchars($_POST['dir_pd']);
		$email_pa = htmlspecialchars($_POST['email_pd']);
		//Agregamos los datos del padre
		$model = new Crud;
		$model->into = "padres";
		$model->columns = "ced_alu, nombres, apellidos, cedula, nac, ec, tlf, ocp, ingreso, dir, email";
		$model->values = "'$cedula', '$nom_pa', '$ape_pa', '$ced_pa', '$nac_pa', '$ec_pa', '$tlf_pa', '$ocp_pa', '$ingreso_pa', '$dir_pa', '$email_pa'";
		$model->Create();
		//Contacto de Emergencia
		$nom_em = htmlspecialchars($_POST['nom_em']);
		$ape_em = htmlspecialchars($_POST['ape_em']);
		$tlf_em = htmlspecialchars($_POST['tlf_em']);
		$parent_em = htmlspecialchars($_POST['parent_em']);
		//Agregamos el contacto de emergencia
		$model = new Crud;
		$model->into = "emergencia";
		$model->columns = "ced_alu, nombres, apellidos, tlf, parent";
		$model->values = "'$cedula', '$nom_em', '$ape_em', '$tlf_em', '$parent_em'";
		$model->Create();
		//AMBIENTE SOCIO-FAMILIAR
		//Personas que viven en el hogar
		$padre = htmlspecialchars($_POST['padre']);
		$madre = htmlspecialchars($_POST['madre']);
		$n_hnos = htmlspecialchars($_POST['n_hnos']);
		$n_abl = htmlspecialchars($_POST['n_abl']);
		$n_tios = htmlspecialchars($_POST['n_tios']);
		$n_otr = htmlspecialchars($_POST['n_otr']);
		//Características de la vivienda
		$tipo = htmlspecialchars($_POST['tipo']);
		$material = htmlspecialchars($_POST['material']);
		//Distribución de la vivienda
		$dormi = htmlspecialchars($_POST['dormi']);
		$cocina = htmlspecialchars($_POST['cocina']);
		$bano = htmlspecialchars($_POST['bano']);
		$comedor = htmlspecialchars($_POST['comedor']);
		//Tendencia de la vivienda
		$tend = htmlspecialchars($_POST['tend']);
		//Cuidados del alumno
		$cuida = htmlspecialchars($_POST['cuida']);
		$cdobs = htmlspecialchars($_POST['cdobs']);
		//Asistencias del alumno
		$asis = htmlspecialchars($_POST['asis']);
		//Orientacion del alumno
		$orien = htmlspecialchars($_POST['orien']);
		//Relaciones del alumno
		$padres = htmlspecialchars($_POST['padres']);
		$hnos = htmlspecialchars($_POST['hnos']);
		$flia = htmlspecialchars($_POST['flia']);
		$amg = htmlspecialchars($_POST['amg']);
		//Consultas a las que ha asistido
		$consulta = htmlspecialchars($_POST['consulta']);
		$pq = htmlspecialchars($_POST['pq']);
		//Agregamos los datos del ambiente socio-familiar
		$model = new Crud;
		$model->into = "ambiente";
		$model->columns = "ced_alu, padre, madre, n_hnos, n_abl, n_tios, n_otr, tipo, material, dormi, cocina, bano, comedor, tend, cuida, cdobs, asis, orien, padres, hnos, flia, amg, consulta, pq";
		$model->values = "'$cedula', '$padre', '$madre', $n_hnos, $n_abl, $n_tios, $n_otr, '$tipo', '$material', $dormi, $cocina, $bano, $comedor, '$tend', '$cuida', '$cdobs', '$asis', '$orien', '$padres', '$hnos', '$flia', '$amg', '$consulta', '$pq'";
		$model->Create();
		//Antecedentes prenatales
		$plan = htmlspecialchars($_POST['plan']);
		if (isset($_POST['enf'])) {
			$array_enf = $_POST['enf'];
		$enf = implode(", ", $array_enf);
		} else {
			$enf = "Ninguna";
		}
		$trab = htmlspecialchars($_POST['trab']);
		$tipo_trab = htmlspecialchars($_POST['tipo_trab']);
		$suf = htmlspecialchars($_POST['suf']);
		$gs = htmlspecialchars($_POST['gs']);
		//Antecedentes para-natales
		$parto = htmlspecialchars($_POST['parto']);
		$edad = htmlspecialchars($_POST['edad']);
		$prob = htmlspecialchars($_POST['prob']);
		//Antecedentes post-natales
		$peso_nac = htmlspecialchars($_POST['peso_nac']);
		$talla_nac = htmlspecialchars($_POST['talla_nac']);
		$prob_nac = htmlspecialchars($_POST['prob_nac']);
		$causa = htmlspecialchars($_POST['causa']);
		//Agregamos los antecedentes
		$model = new Crud;
		$model->into = "antecedentes";
		$model->columns = "ced_alu, plan, enf, trab, tipo, suf, gs, parto, edad, prob, peso, talla, nac, causa";
		$model->values = "'$cedula', '$plan', '$enf', '$trab', '$tipo_trab', '$suf', '$gs', '$parto', '$edad', '$prob', $peso, $talla, '$prob_nac', '$causa'";
		$model->Create();
		//Desarrollo Lenguaje y Motor
		$hbl = htmlspecialchars($_POST['hbl']);
		$cam = htmlspecialchars($_POST['cam']);
		$mano = htmlspecialchars($_POST['mano']);
		//Condiciones del alumno
		$cual = htmlspecialchars($_POST['cual']);
		$causa_cond = htmlspecialchars($_POST['causa_cond']);
		$control = htmlspecialchars($_POST['control']);
		//Salud del alumno
		if (isset($_POST['vac'])) {
			$array_vac = $_POST['vac'];
			$vac = implode(", ", $array_vac);
		}
		else{
			$vac = "Ninguna";
		}
		if (isset($_POST['enf_alu'])) {
			$array_enf_alu = $_POST['enf_alu'];
			$enf_alu = implode(", ", $array_enf_alu);
		}
		else{
			$enf_alu = "Ninguna";
		}
		$gs_alu = htmlspecialchars($_POST['gs_alu']);
		$hosp = htmlspecialchars($_POST['hosp']);
		$hcs = htmlspecialchars($_POST['hcs']);
		$alg = htmlspecialchars($_POST['alg']);
		$acs = htmlspecialchars($_POST['acs']);
		//Agregamos la salud del alumno
		$model = new Crud;
		$model->into = "salud";
		$model->columns = "ced_alu, hbl, cam, mano, cual, causa, control, vac, enf, gs, hosp, hcs, alg, acs";
		$model->values = "'$cedula', $hbl, $cam, '$mano', '$cual', '$causa_cond', '$control', '$vac', '$enf_alu', '$gs_alu', '$hosp', '$hcs', '$alg', '$acs'";
		$model->Create();
		//Historial de aulas
		$model = new Crud;
		$model->into = "historial";
		$model->columns = "ced_alu, aula";
		$model->values = "'$cedula', $aula";
		$model->Create();
		//Agregamos evento en auditoria
		$accion = "Inscripción de Alumno Nuevo";
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