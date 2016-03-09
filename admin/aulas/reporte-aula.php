<?php

require '../../sql/Conexion.php';
require '../../sql/Crud.php';
require '../../sql/Funciones.php';

$id = htmlspecialchars($_GET['id']);

$model = new Crud;
$model->select = "*";
$model->from = "aulas";
$model->condition = "id=$id ORDER BY seccion ASC";
$model->Read();
$aulas = $model->rows;
foreach ($aulas as $aula)
{
  $id = $aula['id'];
  $seccion = $aula['seccion'];
  $turno = $aula['turno'];
  $grupo = $aula['grupo'];
  $desde = $aula['desde'];
  $hasta = $aula['hasta'];
  $dct = $aula['dct'];
}


function buscar_alumnos($id_aula)
{
  $model = new Crud;
  $model->select = "*";
  $model->from = "alumnos";
  $model->condition = "aula=$id_aula ORDER BY nombres ASC";
  $model->Read();
  $alumnos = $model->rows;
  return $alumnos;
}


$fecha = date("d-m-Y");

$doc = "Lista de alumnos $fecha.pdf";
ob_start();

?>
<page>
  <style>
  .pag{
    position: relative;
    padding: 10px;
    width: 100%;
    height: 90%;
    font-size: 13px;
    box-sizing: border-box;
  }
  .pag h1{
    font-size: 24px;
  }
  .pag h2{
    font-size: 20px;
  }
  .header{
    width: 99%;
    height: 50px;
  }
  .logo{
    width: 100px;
    height: 100px;
  }
  table{
    margin: auto;
  }
  table td, table th{
    padding: 10px;
    width: auto;
    text-align: center;
  }
  .title{
    padding: 0;
    width: auto;
    text-align: center;
  }
  </style>
  <div class="pag">
    <img src="../../img/header.jpg" class="header">
    <table class="cabecera">
      <tr>
        <td style="width:120px;"><img src="../../img/logo.jpg" class="logo"></td>
        <td style="width:500px;"><h1>Jardín de Infancia "Felix Antonio Calderón"</h1></td>
      </tr>
    </table>
    <hr>
    <table>
      <tr>
        <td><b>Seccion:</b> <?php echo $seccion; ?></td>
        <td><b>Turno:</b> <?php echo $turno; ?></td>
        <td><b>Periodo:</b> <?php echo $desde; ?>-<?php echo $hasta; ?></td>
        <td><b>Grupo:</b> <?php echo $grupo; ?></td>
        <td><b>Docente:</b> <?php echo nmb_dct($dct); ?> <?php echo ape_dct($dct); ?></td>
      </tr>
    </table>
    <?php 
    $alumnos = buscar_alumnos($id);
    $i = 0;
    $fem = 0;
    $mas = 0;
    if(count($alumnos) > 0):
    ?>
    <table>
      <tr>
        <td><b>Nro.</b></td>
        <td><b>Nombres</b></td>
        <td><b>Apellidos</b></td>
        <td><b>Edad</b></td>
        <td><b>Sexo</b></td>
      </tr>
      <?php
        foreach ($alumnos as $alumno):
        $i++;
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $alumno['nombres']; ?></td>
        <td><?php echo $alumno['apellidos']; ?></td>
        <td><?php echo CalculaEdad($alumno['fenac']); ?></td>
        <td><?php echo $alumno['sexo']; ?></td>
      </tr>
      <?php
      if ($alumno['sexo'] == "Femenino")
      {
        $fem++;
      }
      else
      {
        $mas++;
      }
      ?>
      <?php endforeach; ?>
      <tr>
        <td colspan="5"><b>Total Alumnos:</b> <?php echo $i; ?> | <b>Total Sexo Femenino:</b> <?php echo $fem ?> | <b>Total Sexo Masculino:</b> <?php echo $mas; ?></td>
      </tr>
    </table>
    <?php else: ?>
    <table>
      <tr>
        <td><strong> No se encuentran alumnos inscritos en esta aula.</strong></td>
      </tr>
    </table>
    <?php endif; ?>
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