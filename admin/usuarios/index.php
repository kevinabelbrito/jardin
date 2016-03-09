<?php
require '../../templates/dominio.php';
require '../../sql/PDO_Pagination.php';
require '../../sql/Conexion-lista.php';
require '../../sql/usuarios/Listar.php';
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
<title>Usuarios del sistema</title>
<?php
require '../../templates/plugins.php';
require '../../templates/admin/header.php';
?>
<div class="options">
    <a href="agregar.php" class="admin"><span>Nuevo Administrador</span></a>
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
       <td colspan="6"><h2 align="center">Lista de Usuarios</h2></td>
    </tr>
    <tr>
        <th><b>USUARIO</b></th>
        <th><b>NOMBRES</b></th>
        <th><b>APELLIDOS</b></th>
        <th><b>PRIVILEGIOS</b></th>
        <th><b>ESTADO</b></th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($model as $row): ?>
    <tr>
        <td><?php echo $row['usuario']; ?></td>
        <td><?php echo $row['nombres']; ?></td>
        <td><?php echo $row['apellidos']; ?></td>
        <td><?php echo $row['tipo']; ?></td>
        <td><?php echo $row['estado']; ?></td>
        <td>
            <div class="options">
            <?php if ($row['id'] != $id_admin){?>
            <?php if ($tipo_admin == "Administrador"):?>
            <a href="editar.php?id=<?php echo $row['id']; ?>" class="write"><span>Editar</span></a>
            <a href="eliminar.php?id=<?php echo $row['id']; ?>&admin=<?php echo $admin; ?>&user=<?php echo $row['usuario']; ?>" class="exit"><span>Eliminar</span></a>
            <?php if ($row['estado'] == "Inhabilitado"){?>
            <a href="hab-ina.php?id=<?php echo $row['id']; ?>&admin=<?php echo $admin; ?>&user=<?php echo $row['usuario']; ?>&estado=Habilitado" class="aceptar"><span>Habilitar</span></a>
            <?php }else{?>
            <a href="hab-ina.php?id=<?php echo $row['id']; ?>&admin=<?php echo $admin; ?>&user=<?php echo $row['usuario']; ?>&estado=Inhabilitado" class="cancelar"><span>Inhabilitar</span></a>
            <?php
            }
            endif
            ?>
            <?php
            }
            else{?>
            Usuario en línea
            <?php
            }
            ?>
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