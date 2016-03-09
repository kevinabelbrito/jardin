<?php

require '../../sql/Conexion.php';
require '../../sql/Crud.php';

$model = new Crud;
$model->select = "*";
$model->from = "auditoria";
$model->condition = "id > 0 ORDER BY fehr DESC LIMIT 0, 30";
$model->Read();
$rows = $model->rows;
$total = count($rows);

$fecha = date("d-m-Y");

$doc = "Auditoria_$fecha.pdf";
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
    <table border="1" style="text-align:center;">
      <tr>
        <td colspan="5">
          <h1>Auditoría del Sistema</h1>
        </td>
      </tr>
      <tr>
        <td><b>Usuario</b></td>
        <td><b>Acción</b></td>
        <td><b>Referencia</b></td>
        <td><b>Fecha y Hora</b></td>
      </tr>
      <?php foreach ($rows as $row):?>
      <tr>
        <td><?php echo $row['admin']; ?></td>
        <td><?php echo $row['accion']; ?></td>
        <td><?php echo $row['referencia']; ?></td>
        <td><?php echo date("d-m-Y h:i a",strtotime($row['fehr'])); ?></td>
      </tr>
      <?php endforeach ?>
    </table>
  </div>
</page>
<?php

$content = ob_get_clean();
require_once('../../sql/html2pdf/html2pdf.class.php');
//Si indicamos el valor P sale vertical y L seria horizontal
$pdf = new HTML2PDF('L', 'A4', 'fr', 'UTF-8');
$pdf->writeHTML($content);
//$pdf->pdf->IncludeJS('print(TRUE)');
$pdf->output($doc);

?>