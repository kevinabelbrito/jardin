<?php

require '../../sql/Conexion.php';
require '../../sql/Crud.php';
require '../../sql/Funciones.php';

$cedula = htmlspecialchars($_GET['cedula']);
//DATOS DEL ALUMNO
$model = new Crud;
$model->select = "*";
$model->from = "alumnos";
$model->condition = "cedula='$cedula'";
$model->Read();
$alumnos = $model->rows;
foreach ($alumnos as $alum)
{
  $nombres = $alum['nombres'];
  $apellidos = $alum['apellidos'];
  $fenac = date("d-m-Y", strtotime($alum['fenac']));
  $edad = CalculaEdad($alum['fenac']);
  $sexo = $alum['sexo'];
  $peso = round($alum['peso'], 2);
  $talla = $alum['talla'];
  $nac = $alum['nac'];
  $lugarnac = $alum['lugarnac'];
  $feins = date("d-m-Y", strtotime($alum['feins']));
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
//DATOS DE LA MADRE
$model = new Crud;
$model->select = "*";
$model->from = "madres";
$model->condition = "ced_alu='$cedula'";
$model->Read();
$madres = $model->rows;
foreach ($madres as $madre)
{
  $nom_ma = $madre['nombres'];
  $ape_ma = $madre['apellidos'];
  $ced_ma = $madre['cedula'];
  $nac_ma = $madre['nac'];
  $ec_ma = $madre['ec'];
  $tlf_ma = $madre['tlf'];
  $ocp_ma = $madre['ocp'];
  $ingreso_ma = $madre['ingreso'];
  $dir_ma = $madre['dir'];
  $email_ma =$madre['email'];
}
//DATOS DEL PADRE
$model = new Crud;
$model->select = "*";
$model->from = "padres";
$model->condition = "ced_alu='$cedula'";
$model->Read();
$padres = $model->rows;
foreach ($padres as $padre)
{
  $nom_pd = $padre['nombres'];
  $ape_pd = $padre['apellidos'];
  $ced_pd = $padre['cedula'];
  $nac_pd = $padre['nac'];
  $ec_pd = $padre['ec'];
  $tlf_pd = $padre['tlf'];
  $ocp_pd = $padre['ocp'];
  $ingreso_pd = $padre['ingreso'];
  $dir_pd = $padre['dir'];
  $email_pd =$padre['email'];
}
//CONTACTO DE EMERGENCIA
$model = new Crud;
$model->select = "*";
$model->from = "emergencia";
$model->condition = "ced_alu='$cedula'";
$model->Read();
$emergencias = $model->rows;
foreach ($emergencias as $emg)
{
  $nom_em = $emg['nombres'];
  $ape_em = $emg['apellidos'];;
  $tlf_em = $emg['tlf'];
  $parent_em =$emg['parent'];
}
//AMBIENTE SOCIO-FAMILIAR
$model = new Crud;
$model->select = "*";
$model->from = "ambiente";
$model->condition = "ced_alu='$cedula'";
$model->Read();
$ambientes = $model->rows;
foreach ($ambientes as $amb)
{
  //a. Personas que viven en el hogar
  $padre_amb = $amb['padre'];
  $madre_amb = $amb['madre'];
  $n_hnos = $amb['n_hnos'];
  $n_abl = $amb['n_abl'];
  $n_tios = $amb['n_tios'];
  $n_otr = $amb['n_otr'];
  //b. Características de la vivienda
  $tipo = $amb['tipo'];
  $material = $amb['material'];
  //c. Distribucion de la vivienda
  $dormi = $amb['dormi'];
  $cocina = $amb['cocina'];
  $bano = $amb['bano'];
  $comedor = $amb['comedor'];
  //d. Tendencia de la vivienda
  $tend = $amb['tend'];
  //e. Cuidados del alumno
  $cuida = $amb['cuida'];
  $cdobs = $amb['cdobs'];
  //f. Asistencias del alumno
  $asis = $amb['asis'];
  //g. Orientacion del alumno
  $orien = $amb['orien'];
  //h. Relaciones del alumno
  $padres_alu = $amb['padres'];
  $hnos = $amb['hnos'];
  $flia = $amb['flia'];
  $amg = $amb['amg'];
  //i. Consultas a las que ha asistido
  $consulta = $amb['consulta'];
  $pq = $amb['pq'];
}
//ANTECEDENTES
$model = new Crud;
$model->select = "*";
$model->from = "antecedentes";
$model->condition = "ced_alu='$cedula'";
$model->Read();
$antecedentes = $model->rows;
foreach ($antecedentes as $ant)
{
  //Antecedentes prenatales
  $plan = $ant['plan'];
  $trab = $ant['trab'];
  $enf = $ant['enf'];
  $tipo_trab = $ant['tipo'];
  $suf = $ant['suf'];
  $gs = $ant['gs'];
  //Antecedentes Para-natales
  $parto = $ant['parto'];
  $edad_pt = $ant['edad'];
  $prob = $ant['prob'];
  //Antecedentes Post-natales
  $peso_nac = $ant['peso'];
  $talla_nac = $ant['talla'];
  $prob_nac = $ant['nac'];
  $causa = $ant['causa'];
}
//SALUD Y OTRAS CARACTERISTICAS
$model = new Crud;
$model->select = "*";
$model->from = "salud";
$model->condition = "ced_alu='$cedula'";
$model->Read();
$carac = $model->rows;
foreach ($carac as $sal)
{
  //Desarrollo Lenguaje y Motor
  $hbl = $sal['hbl'];
  $cam = $sal['cam'];
  $mano = $sal['mano'];
  //Condiciones del alumno
  $cual = $sal['cual'];
  $causa_cond = $sal['causa'];
  $control = $sal['control'];
  //Salud del alumno
  $vac = $sal['vac'];
  $enf_alu = $sal['enf'];
  $gs_alu = $sal['gs'];
  $hosp = $sal['hosp'];
  $hcs = $sal['hcs'];
  $alg = $sal['alg'];
  $acs = $sal['acs'];
}
$fecha = date("d-m-Y");
$doc = "Inscripcion Alumno nuevo $nombres $apellidos $fecha.pdf";
ob_start();

?>
<style>
  .pag{
    padding: 0;
    width: 100%;
    height: 80%;
    font-size: 14px;
    box-sizing: border-box;
  }
  .pag h1{
    font-size: 24px;
  }
  .pag h2{
    font-size: 20px;
  }
  .header{
    width: 100%;
    height: 50px;
  }
  .logo{
    width: 100px;
    height: 100px;
  }
  table{
    margin: auto;
  }
  table td{
    padding: 10px;
    width: 130px;
  }
  .title{
    padding: 0;
    width: auto;
    text-align: center;
  }
  </style>
<page backtop="160px" backbottom="10px" backleft="10px" backright="10px">
    <page_header>
    <img src="../../img/header.jpg" class="header">
    <table class="cabecera">
      <tr>
        <td style="width:120px;"><img src="../../img/logo.jpg" class="logo"></td>
        <td style="width:500px; text-align:center;"><h1>Jardín de Infancia <br> "Felix Antonio Calderón"</h1></td>
      </tr>
    </table>
    </page_header>
    <page_footer>
      <p align="center">Página [[page_cu]] de [[page_nb]]</p>
    </page_footer>
    <div class="pag">
    <table border="1">
      <tr>
        <td><b>Asunto:</b></td>
        <td>Inscripción de Alumno Nuevo</td>
        <td><b>Fecha de Inscripción:</b></td>
        <td><?php echo $feins; ?></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>Datos del Alumno</h2></td>
      </tr>
      <tr>
        <td><b>Nombres:</b></td>
        <td><?php echo $nombres; ?></td>
        <td><b>Apellidos:</b></td>
        <td><?php echo $apellidos; ?></td>
      </tr>
      <tr>
        <td><b>Fecha de nacimiento:</b></td>
        <td><?php echo $fenac; ?></td>
        <td><b>Edad:</b></td>
        <td><?php echo $edad; ?> Años</td>
      </tr>
      <tr>
        <td><b>Sexo:</b></td>
        <td><?php echo $sexo; ?></td>
        <td><b>Peso:</b></td>
        <td><?php echo $peso; ?></td>
      </tr>
      <tr>
        <td><b>Talla:</b></td>
        <td><?php echo $talla; ?></td>
        <td><b>Nacionalidad:</b></td>
        <td><?php echo $nac; ?></td>
      </tr>
      <tr>
        <td><b>Lugar de Nacimiento:</b></td>
        <td><?php echo $lugarnac; ?></td>
        <td><b>Cedula Escolar:</b></td>
        <td><?php echo $cedula; ?></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>Datos del Aula</h2></td>
      </tr>
      <tr>
        <td><b>Sección:</b></td>
        <td><?php echo $seccion; ?></td>
        <td><b>Grupo:</b></td>
        <td><?php echo $grupo; ?></td>
      </tr>
      <tr>
        <td><b>Turno:</b></td>
        <td><?php echo $turno; ?></td>
        <td><b>Periodo Escolar:</b></td>
        <td><?php echo $desde; ?>-<?php echo $hasta; ?></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>Datos del Docente</h2></td>
      </tr>
      <tr>
        <td><b>Nombres:</b></td>
        <td><?php echo $nmb_dct; ?></td>
        <td><b>Apellidos:</b></td>
        <td><?php echo $ape_dct; ?></td>
      </tr>
      <tr>
        <td><b>Cedula de Identidad:</b></td>
        <td><?php echo $nac_dct; ?>-<?php echo $ced_dct; ?></td>
        <td><b>Teléfono:</b></td>
        <td><?php echo $tlf_dct; ?></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>Datos del Representante</h2></td>
      </tr>
      <tr>
        <td><b>Nombres:</b></td>
        <td><?php echo $nom_rp; ?></td>
        <td><b>Apellidos:</b></td>
        <td><?php echo $ape_rp; ?></td>
      </tr>
      <tr>
        <td><b>Teléfono:</b></td>
        <td><?php echo $tlf; ?></td>
        <td colspan="2" style="width:150px;"><b>Dirección:</b> <?php echo $dir; ?></td>
      </tr>
      <tr>
        <td><b>E-Mail:</b></td>
        <td><?php echo $email; ?></td>
        <td><b>Parentesco</b></td>
        <td><?php echo $parent; ?></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>Datos de la Madre</h2></td>
      </tr>
      <tr>
        <td><b>Nombres:</b></td>
        <td><?php echo $nom_ma; ?></td>
        <td><b>Apellidos:</b></td>
        <td><?php echo $ape_ma; ?></td>
      </tr>
      <tr>
        <td><b>Cedula de Identidad:</b></td>
        <td><?php echo $ced_ma; ?></td>
        <td><b>Nacionalidad:</b></td>
        <td><?php echo $nac_ma; ?></td>
      </tr>
      <tr>
        <td><b>Estado Civil:</b></td>
        <td><?php echo $ec_ma; ?></td>
        <td><b>Teléfono:</b></td>
        <td><?php echo $tlf_ma; ?></td>
      </tr>
      <tr>
        <td><b>Ocupación</b></td>
        <td><?php echo $ocp_ma; ?></td>
        <td><b>Ingreso Mensual:</b></td>
        <td>Bs. <?php echo $ingreso_ma; ?></td>
      </tr>
      <tr>
        <td colspan="2" style="width:150px;"><b>Dirección:</b> <?php echo $dir_ma; ?></td>
        <td><b>E-Mail:</b></td>
        <td><?php echo $email_ma; ?></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>Datos del Padre</h2></td>
      </tr>
      <tr>
        <td><b>Nombres:</b></td>
        <td><?php echo $nom_pd; ?></td>
        <td><b>Apellidos</b></td>
        <td><?php echo $ape_pd; ?></td>
      </tr>
      <tr>
        <td><b>Cedula de Identidad:</b></td>
        <td><?php echo $ced_pd; ?></td>
        <td><b>Nacionalidad:</b></td>
        <td><?php echo $nac_pd; ?></td>
      </tr>
      <tr>
        <td><b>Estado Civil:</b></td>
        <td><?php echo $ec_pd; ?></td>
        <td><b>Teléfono:</b></td>
        <td><?php echo $tlf_pd; ?></td>
      </tr>
      <tr>
        <td><b>Ocupación</b></td>
        <td><?php echo $ocp_pd; ?></td>
        <td><b>Ingreso Mensual:</b></td>
        <td>Bs. <?php echo $ingreso_pd; ?></td>
      </tr>
      <tr>
        <td colspan="2" style="width:150px;"><b>Dirección:</b> <?php echo $dir_pd; ?></td>
        <td><b>E-Mail:</b></td>
        <td><?php echo $email_pd; ?></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>Contacto de Emergencia</h2></td>
      </tr>
      <tr>
        <td><b>Nombres:</b></td>
        <td><?php echo $nom_em; ?></td>
        <td><b>Apellidos:</b></td>
        <td><?php echo $ape_em; ?></td>
      </tr>
      <tr>
        <td><b>Teléfono:</b></td>
        <td><?php echo $tlf_em; ?></td>
        <td><b>Parentesco:</b></td>
        <td><?php echo $parent_em; ?></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>Ambiente Socio-Familiar</h2></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:center; width:auto;"><b>a. Personas que viven en el hogar</b></td>
      </tr>
      <tr>
        <td><b>Padre:</b></td>
        <td><?php echo $padre_amb; ?></td>
        <td><b>Madre:</b></td>
        <td><?php echo $madre_amb; ?></td>
      </tr>
      <tr>
        <td><b>Hermanos:</b></td>
        <td><?php echo $n_hnos; ?></td>
        <td><b>Abuelos:</b></td>
        <td><?php echo $n_abl; ?></td>
      </tr>
      <tr>
        <td><b>Tíos:</b></td>
        <td><?php echo $n_tios; ?></td>
        <td><b>Otros:</b></td>
        <td><?php echo $n_otr; ?></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:center; width:auto;"><b>b. Características de la vivienda</b></td>
      </tr>
      <tr>
        <td><b>Tipo de Construcción:</b></td>
        <td><?php echo $tipo; ?></td>
        <td><b>Material:</b></td>
        <td><?php echo $material; ?></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:center; width:auto;"><b>c. Distribución de la vivienda</b></td>
      </tr>
      <tr>
        <td><b>Dormitorios:</b></td>
        <td><?php echo $dormi; ?></td>
        <td><b>Cocina:</b></td>
        <td><?php echo $cocina; ?></td>
      </tr>
      <tr>
        <td><b>Baño:</b></td>
        <td><?php echo $bano; ?></td>
        <td><b>Comedor:</b></td>
        <td><?php echo $comedor; ?></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align:center; width:auto;"><b>d. Tendencia de la vivienda</b></td>
        <td colspan="2" style="text-align:center; width:auto;"><?php echo $tend; ?></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:center; width:auto;"><b>e. ¿Quién cuida al alumno durante el tiempo que permanece en el hogar?</b></td>
      </tr>
      <tr>
        <td><b>Parentesco:</b></td>
        <td><?php echo $cuida; ?></td>
        <td colspan="2" style="width:150px;"><b>Observaciones:</b> <?php echo $cdobs; ?></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align:center; width:auto;"><b>f. ¿Ha asistido anteriormente al prescolar?</b></td>
        <td colspan="2" style="text-align:center; width:auto;"><?php echo $asis; ?></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:center; width:auto;"><b>g. ¿Ha orientado al alumno con respecto a su ingreso a la institución? ¿Cómo?</b></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:center; width:auto;"><?php echo $orien; ?></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:center; width:auto;"><b>h. Como son sus relaciones</b></td>
      </tr>
      <tr>
        <td><b>Padres:</b></td>
        <td><?php echo $padres_alu; ?></td>
        <td><b>Hermanos:</b></td>
        <td><?php echo $hnos; ?></td>
      </tr>
      <tr>
        <td><b>Familia:</b></td>
        <td><?php echo $flia; ?></td>
        <td><b>Amigos:</b></td>
        <td><?php echo $amg; ?></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:center; width:auto;"><b>i. ¿Ha asistido alguna vez a consulta con?</b></td>
      </tr>
      <tr>
        <td><b>Especialista:</b></td>
        <td><?php echo $consulta; ?></td>
        <td colspan="2" style="width:150px;"><b>¿Porqué?:</b> <?php echo $pq; ?></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>Antecedentes Prenatales</h2></td>
      </tr>
      <tr>
        <td colspan="2"><b>a. ¿Embarazo Planificado?</b></td>
        <td colspan="2"><?php echo $plan; ?></td>
      </tr>
      <tr>
        <td colspan="2"><b>b. enfermedades sufridas durante el embarazo</b></td>
        <td colspan="2"><?php echo $enf; ?></td>
      </tr>
      <tr>
        <td colspan="2"><b>c. ¿Trabajó la madre durante el embarazo?</b></td>
        <td colspan="2"><?php echo $trab; ?></td>
      </tr>
      <tr>
        <td colspan="2"><b>d. Tipo de trabajo</b></td>
        <td colspan="2"><?php echo $tipo_trab; ?></td>
      </tr>
      <tr>
        <td colspan="2"><b>e. ¿Sufrió la madre durante el embarazo?</b></td>
        <td colspan="2"><?php echo $suf; ?></td>
      </tr>
      <tr>
        <td colspan="2"><b>f. Grupo sanguíneo</b></td>
        <td colspan="2"><?php echo $gs; ?></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>Antecedentes Para-natales</h2></td>
      </tr>
      <tr>
        <td colspan="2"><b>a. ¿Cómo fue el parto?</b></td>
        <td colspan="2"><?php echo $parto; ?></td>
      </tr>
      <tr>
        <td colspan="2"><b>b. Edad de la madre al momento del parto</b></td>
        <td colspan="2"><?php echo $edad_pt; ?></td>
      </tr>
      <tr>
        <td colspan="2"><b>c. Surgió algún problema durante el parto</b></td>
        <td colspan="2"><?php echo $prob; ?></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>Antecedentes Post-natales</h2></td>
      </tr>
      <tr>
        <td><b>a. Peso:</b></td>
        <td><?php echo $peso_nac; ?></td>
        <td><b>Talla:</b></td>
        <td><?php echo $talla_nac; ?></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:center; width:auto;"><b>b. ¿Presento algún problema en los primeros días del nacimiento?</b></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align:center;"><?php echo $prob_nac; ?></td>
        <td colspan="2" style="text-align:justify; width:200px;"><b>Causa:</b> <?php echo $causa; ?></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>Desarrollo Lenguaje y Motor</h2></td>
      </tr>
      <tr>
        <td colspan="2"><b>Edad aproximada cuando empezó hablar</b></td>
        <td colspan="2"><?php echo $hbl; ?> Meses</td>
      </tr>
      <tr>
        <td colspan="2"><b>Edad aproximada cuando empezó a caminar</b></td>
        <td colspan="2"><?php echo $cam; ?> Meses</td>
      </tr>
      <tr>
        <td colspan="2"><b>Mano que utiliza frecuentemente</b></td>
        <td colspan="2"><?php echo $mano; ?></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>¿Presenta alguna condición?</h2></td>
      </tr>
      <tr>
        <td><b>¿Cual?:</b></td>
        <td><?php echo $cual; ?></td>
        <td colspan="2" style="text-align:justify; width:200px;"><b>Causa:</b> <?php echo $causa_cond; ?></td>
      </tr>
      <tr>
        <td><b>Contról Esfínteres</b></td>
        <td><?php echo $control; ?></td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="4" class="title"><h2>Salud del Alumno</h2></td>
      </tr>
      <tr>
        <td colspan="2"><b>¿Cuales vacunas ha recibido el alumno?</b></td>
        <td colspan="2"><?php echo $vac; ?></td>
      </tr>
      <tr>
        <td colspan="2"><b>Enfermedades que ha padecido</b></td>
        <td colspan="2"><?php echo $enf_alu; ?></td>
      </tr>
      <tr>
        <td><b>Grupo Sanguineo</b></td>
        <td><?php echo $gs_alu; ?></td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:center; width:auto;"><b>¿Ha sido hospitalizado alguna vez?</b></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align:center;"><?php echo $hosp; ?></td>
        <td colspan="2" style="text-align:justify; width:150px;"><b>Causa:</b> <?php echo $hcs; ?></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:center; width:auto;"><b>¿Es alérgico?</b></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align:center;"><?php echo $alg; ?></td>
        <td colspan="2" style="text-align:justify; width:200px;"><b>Causa:</b> <?php echo $acs; ?></td>
      </tr>
    </table>
  </div>
</page>
<?php

$content = ob_get_clean();
require_once('../../sql/html2pdf/html2pdf.class.php');
//Si indicamos el valor P sale vertical y L seria horizontal
$pdf = new HTML2PDF('P', 'A4', 'fr', 'UTF-8');
$pdf->writeHTML($content);
//$pdf->pdf->IncludeJS('print(TRUE)');
$pdf->output($doc);

?>