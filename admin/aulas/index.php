<?php
require '../../templates/dominio.php';
require '../../sql/PDO_Pagination.php';
require '../../sql/Conexion-lista.php';
require '../../sql/aulas/Listar.php';
require '../../sql/Conexion.php';
require '../../sql/Crud.php';
require '../../sql/Funciones.php';
require '../../templates/admin/meta.php';
?>
<title>Aulas</title>
<?php
require '../../templates/plugins.php';
require '../../templates/admin/header.php';
?>
<div class="options">
    <?php if ($tipo_admin == "Administrador"):?>
    <a href="agregar.php" class="aulas"><span>Nueva Aula</span></a>
    <?php endif ?>
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
       <td colspan="6"><h2 align="center">Lista de Aulas</h2></td>
    </tr>
    <tr>
        <th><b>Sección</b></th>
        <th><b>Grupo</b></th>
        <th><b>Turno</b></th>
        <th><b>Docente</b></th>
        <th><b>Periodo Escolar</b></th>
        <th><b>Acciones</b></th>
    </tr>
    <?php foreach ($model as $row): ?>
    <tr>
        <td><?php echo $row['seccion']; ?></td>
        <td><?php echo $row['grupo']; ?></td>
        <td><?php echo $row['turno']; ?></td>
        <td><?php echo nmb_dct($row['dct']); ?> <?php echo ape_dct($row['dct']); ?></td>
        <td><?php echo $row['desde']; ?> - <?php echo $row['hasta']; ?></td>
        <td>
            <div class="options">
                <?php if ($tipo_admin == "Administrador"):?>
                <a href="eliminar.php?id=<?php echo $row['id']; ?>&admin=<?php echo $admin; ?>" class="exit"><span>Eliminar</span></a>
                <?php endif ?>
                <a href="reporte-aula.php?id=<?php echo $row['id']; ?>" class="imprimir" target="_blank"><span>Imprimir</span></a>
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