<?php
require '../../templates/dominio.php';
require '../../sql/PDO_Pagination.php';
require '../../sql/Conexion-lista.php';
require '../../sql/alumnos/Listar.php';
require '../../sql/Conexion.php';
require '../../sql/Crud.php';
require '../../sql/Funciones.php';
require '../../templates/admin/meta.php';
?>
<title>Lista de Alumnos</title>
<?php
require '../../templates/plugins.php';
require '../../templates/admin/header.php';
?>
<form action="" id="busqueda" method="get">
  <table class="form-content">
     <tr>
         <td><label for="search">Cedula Escolar</label></td>
         <td><input type="text" name="search" id="search"></td>
         <td><button>Buscar</button></td>
     </tr>
  </table>
</form>
<div class="options">
    <?php if ($tipo_admin == "Administrador" || $tipo_admin == "Operador"):?>
    <a class="alumno" href="regular.php"><span>Alumno regular</span></a>
    <a class="alumno" href="agregar.php"><span>Alumno Nuevo</span></a>
    <?php endif ?>
    <a href="reporte-lista.php" target="_blank" class="imprimir"><span>Imprimir</span></a>
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
       <td colspan="9"><h2 align="center">Lista de Alumnos Inscritos</h2></td>
    </tr>
    <tr>
        <th><b>Cedula Escolar</b></th>
        <th><b>Nombres</b></th>
        <th><b>Apellidos</b></th>
        <th><b>Representante</b></th>
        <th><b>Sección</b></th>
        <th><b>Grupo</b></th>
        <th><b>Turno</b></th>
        <th><b>Periodo</b></th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($model as $row): ?>
    <tr>
        <td><?php echo $row['cedula']; ?></td>
        <td><?php echo $row['nombres']; ?></td>
        <td><?php echo $row['apellidos']; ?></td>
        <td><?php echo $row['nom_rp']; ?> <?php echo $row['ape_rp']; ?></td>
        <td><?php echo seccion($row['aula']); ?></td>
        <td><?php echo grupo($row['aula']); ?></td>
        <td><?php echo turno($row['aula']); ?></td>
        <td><?php echo desde($row['aula']); ?>-<?php echo hasta($row['aula']); ?></td>
        <td>
          <div class="options list">
            <a href="perfil.php?id=<?php echo $row['id']; ?>" class="alumno"><span>Perfil</span></a>
            <?php if ($tipo_admin == "Administrador"):?>
            <a href="eliminar.php?id=<?php echo $row['id']; ?>&admin=<?php echo $admin; ?>" class="exit"><span>Eliminar</span></a>
            <?php endif ?>
          </div>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php
require '../pagination.php';
}
?>
<?php require '../../templates/admin/footer.php'; ?>