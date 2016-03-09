<?php
require '../../templates/dominio.php';
require '../../sql/PDO_Pagination.php';
require '../../sql/Conexion-lista.php';
require '../../sql/docentes/Listar.php';
require '../../templates/admin/meta.php';
?>
<title>Docentes</title>
<?php require '../../templates/plugins.php'; ?>
<script>
    $(function(){
        $("#buscar").validate({
            rules:{
                nac:"required",
                search:{required:true, digits:true}
            },
            messages:{
                nac:"*Indique el campo",
                search:{required:"*Indique el campo", digits:"Solo numeros naturales"}
            }
        });
    });
</script>
<?php require '../../templates/admin/header.php'; ?>
<form method="post" id="buscar">
    <table class="form-content">
        <tr>
            <td><label for="nac">Cedula de Identidad</label></td>
            <td>
                <select name="nac" id="nac">
                    <option value="">-</option>
                    <option value="V">V</option>
                    <option value="E">E</option>
                </select>
                <input type="text" name="search" id="search" maxlength="10" placeholder="Ej: 12345678">
            </td>
            <td><button>Buscar</button></td>
        </tr>
    </table>
</form>
<div class="options">
    <?php if ($tipo_admin == "Administrador"):?>
    <a href="agregar.php" class="identificarse"><span>Nuevo docente</span></a>
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
       <td colspan="5"><h2 align="center">Lista de Docentes</h2></td>
    </tr>
    <tr>
        <th><b>Nombres</b></th>
        <th><b>Apellidos</b></th>
        <th><b>Cedula de Identidad</b></th>
        <th><b>Teléfono</b></th>
        <th><b>Acciones</b></th>
    </tr>
    <?php foreach ($model as $row): ?>
    <tr>
        <td><?php echo $row['nombres']; ?></td>
        <td><?php echo $row['apellidos']; ?></td>
        <td><?php echo $row['nac']; ?>-<?php echo $row['cedula']; ?></td>
        <td><?php echo $row['tlf']; ?></td>
        <td>
            <div class="options">
                <?php if ($tipo_admin == "Administrador"):?>
                <a href="editar.php?id=<?php echo $row['id']; ?>" class="write"><span>Editar</span></a>
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