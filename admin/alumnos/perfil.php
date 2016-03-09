<?php
require '../../templates/dominio.php';
require '../../sql/Conexion.php';
require '../../sql/Crud.php';
require '../../sql/Funciones.php';
require '../../sql/alumnos/Perfil.php';
require '../../templates/admin/meta.php';
?>
<title><?php echo $nombres; ?> <?php echo $apellidos; ?></title>
<?php
require '../../templates/plugins.php';
require '../../templates/admin/header.php';
?>
<div class="perfil">
	<table class="list" border="1">
		<tr>
			<td colspan="4" style="text-align:center;">
				<h2>Datos del Alumno</h2>
			</td>
		</tr>
		<tr>
			<td><b>Nombres:</b></td>
			<td><?php echo $nombres; ?></td>
			<td><b>Apellidos:</b></td>
			<td><?php echo $apellidos; ?></td>
		</tr>
		<tr>
			<td><b>Fecha de Nacimiento:</b></td>
			<td><?php echo date("d-m-Y", strtotime($fenac)); ?></td>
			<td><b>Edad:</b></td>
			<td><?php echo CalculaEdad($fenac); ?> Años</td>
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
			<td colspan="4" style="text-align:center;">
				<h2>Datos del Aula</h2>
			</td>
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
			<td><b>Periodo:</b></td>
			<td><?php echo $desde; ?>-<?php echo $hasta; ?></td>
		</tr>
		<tr>
			<td colspan="4" style="text-align:center;">
				<h2>Datos del Docente</h2>
			</td>
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
			<td colspan="4" style="text-align:center;">
				<h2>Datos del Representante</h2>
			</td>
		</tr>
		<tr>
			<td><b>Nombres:</b></td>
			<td><?php echo $nom_rp; ?></td>
			<td><b>Apellido:</b></td>
			<td><?php echo $ape_rp; ?></td>
		</tr>
		<tr>
			<td><b>Teléfono:</b></td>
			<td><?php echo $tlf; ?></td>
			<td style="max-width:200px;"><b>Dirección:</b></td>
			<td><?php echo $dir; ?></td>
		</tr>
		<tr>
			<td><b>E-Mail:</b></td>
			<td><?php echo $email; ?></td>
			<td><b>Parentesco:</b></td>
			<td><?php echo $parent; ?></td>
		</tr>
	</table>
	<div class="options">
		<a href="index.php" class="reportes"><span>Lista</span></a>
		<?php if ($tipo_admin == "Administrador" || $tipo_admin == "Operador"): ?>
		<a href="editar.php?id=<?php echo $id; ?>" class="write"><span>Modificar</span></a>
		<?php endif; ?>
		<a href="reporte-nuevo.php?cedula=<?php echo $cedula; ?>" target="_blank" class="imprimir"><span>Imprimir información del alumno</span></a>
	</div>
</div>
<?php require '../../templates/admin/footer.php'; ?>