<?php
require '../../templates/dominio.php';
require '../../sql/PDO_Pagination.php';
require '../../sql/Conexion-lista.php';
require '../../sql/auditoria/Auditar.php';
require '../../templates/admin/meta.php';
if ($tipo_admin != "Administrador"):
?>
<script>
    alert("¡¡ACCESO DENEGADO!!");
    window.location="../index.php";
</script>
<?php
endif
?>
<title>Auditoria del sistema</title>
<?php
require '../../templates/plugins.php';
require '../../templates/admin/header.php';
?>
<form id="search">
   <table class="form-content">
       <tr>
           <td>
               <select name="search" id="search">
                   <option value="">Todo</option>
                   <option value="Registro de Usuario">Registro de Usuario</option>
                   <option value="Actualización de Usuario">Actualización de Usuario</option>
                   <option value="Estado de Usuario">Estado de Usuario</option>
                   <option value="Eliminación de Usuario">Eliminación de Usuario</option>
                   <option value="Registro de Aula">Registro de Aula</option>
                   <option value="Eliminación de Aula">Eliminación de Aula</option>
                   <option value="Registro de Docente">Registro de Docente</option>
                   <option value="Actualización de Docente">Actualización de Docente</option>
                   <option value="Eliminación de Docente">Eliminación de Docente</option>
                   <option value="Inscripción de Alumno Nuevo">Inscripción de Alumno Nuevo</option>
                   <option value="Inscripción de Alumno Regular">Inscripción de Alumno Regular</option>
                   <option value="Actualización de Alumno">Actualización de Alumno</option>
                   <option value="Eliminación de Alumno">Eliminación de Alumno</option>
                   <option value="Ingresó al Sistema">Ingresó al Sistema</option>
                   <option value="Salió del Sistema">Salió del Sistema</option>
               </select>
           </td>
           <td><button>Buscar</button></td>
       </tr>
   </table>
</form>
<div class="options">
  <a target="_blank" href="reporte.php" class="imprimir"><span>Imprimir reporte de auditoría</span></a>
  <a href="../" class="exit"><span>Salir</span></a>
</div>
<?php 
if ($total == 0)
{
?>
<h2 align='center'><?php echo $mensaje; ?></h2>
<?php
}
else
{
?>
<table class="list" border="1">
    <tr>
       <td colspan="4"><h2 align="center">Eventos del sistema</h2></td>
    </tr>
    <tr>
        <th><b>Usuario</b></th>
        <th><b>Acción</b></th>
        <th><b>Referencia</b></th>
        <th><b>Fecha y Hora</b></th>
    </tr>
    <?php foreach ($model as $row): ?>
    <tr>
        <td><?php echo $row['admin']; ?></td>
        <td><?php echo $row['accion']; ?></td>
        <td><?php echo $row['referencia']; ?></td>
        <td><?php echo date("d-m-Y h:i a", strtotime($row['fehr'])); ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php
require '../pagination.php';
}
?>
<?php require '../../templates/admin/footer.php'; ?>