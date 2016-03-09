<?php

require '../../sql/Conexion.php';
require '../../sql/Crud.php';
require '../../sql/Funciones.php';

$cedula = htmlspecialchars($_GET['cedula']);

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
$fecha = date("d-m-Y");

$doc = "Inscripcion Alumno regular $nombres $apellidos $fecha.pdf";
ob_start();

?>
<style>
  .pag{
    padding: 0;
    width: 100%;
    height: 90%;
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
<page backtop="160px" backbottom="0" backleft="10px" backright="10px">
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
        <td>Inscripción de Alumno Regular</td>
        <td><b>Fecha de Reinscripción:</b></td>
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
        <td style="max-width:300px;"><b>Dirección:</b></td>
        <td><?php echo $dir; ?></td>
      </tr>
      <tr>
        <td><b>E-Mail:</b></td>
        <td><?php echo $email; ?></td>
        <td><b>Parentesco</b></td>
        <td><?php echo $parent; ?></td>
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