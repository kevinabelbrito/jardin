<?php
require '../../templates/dominio.php';
require '../../templates/admin/meta.php';
if ($id_admin != $_GET['id']):
?>
<script>
    alert("¡¡ACCESO DENEGADO!!");
    window.location="../index.php";
</script>
<?php
endif
?>
<title>Cambiar Contraseña</title>
<?php require '../../templates/plugins.php'; ?>
<script>
	$(function(){
		$("#clave").validate({
			submitHandler:function(){
				var str = $("#clave").serialize();
		        $.post("../../sql/usuarios/Cambio.php", str, procesar).error(proerror);
		        function procesar(datos){
		            alert(datos);
		        }
		        function proerror(){
		            alert("Fallo la conexion al servidor, intente mas tarde");
		        }
		        return false;
			},
			rules:{
				clave:{required:true, minlength:6},
				nueva:{required:true, minlength:6},
				conf:{required:true, equalTo:"#nueva"}
			},
			messages:{
				clave:{required:"*Indique el campo", minlength:"Minimo 6 caracteres"},
				nueva:{required:"*Indique el campo", minlength:"Minimo 6 caracteres"},
				conf:{required:"*Indique el campo", equalTo:"Las contraseñas no coinciden"}
			}
		});
	});
</script>
<?php require '../../templates/admin/header.php'; ?>
<form id="clave">
	<table class="form-content">
		<tr>
			<td colspan="2"><h2 align="center">Cambiar Contraseña</h2></td>
		</tr>
		<tr>
			<td><label for="clave">Contraseña Vigente</label></td>
			<td><input type="password" name="clave" id="clave" maxlength="20"></td>
		</tr>
		<tr>
			<td><label for="nueva">Nueva Contraseña</label></td>
			<td><input type="password" name="nueva" id="nueva" maxlength="20"></td>
		</tr>
		<tr>
			<td><label for="conf">Confirmar Contraseña</label></td>
			<td><input type="password" name="conf" id="conf" maxlength="20"></td>
		</tr>
		<tr>
			<td>
				<input type="hidden" name="id" value="<?php echo $id_admin; ?>">
				<input type="hidden" name="admin" value="<?php echo $admin; ?>">
				<input type="hidden" name="cambio">
			</td>
			<td>
				<a href="../" class="transparente cancelar"><span>Salir</span></a>
				<button class="transparente aceptar"><span>Aceptar</span></button>
			</td>
		</tr>
	</table>
</form>

<?php require '../../templates/admin/footer.php'; ?>