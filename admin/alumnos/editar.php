<?php
require '../../templates/dominio.php';
require '../../sql/Conexion.php';
require '../../sql/Crud.php';
require '../../sql/Funciones.php';
require '../../sql/alumnos/Perfil.php';
require '../../templates/admin/meta.php';
if ($tipo_admin != "Administrador" && $tipo_admin != "Operador"):
?>
<script>
    alert("¡¡ACCESO DENEGADO!!");
    window.location="../index.php";
</script>
<?php
endif
?>
<title><?php echo $nombres; ?> <?php echo $apellidos; ?></title>
<?php require '../../templates/plugins.php'; ?>
<script>
	$(function(){
        //Funciones para mostrar la edad
        $("#fenac").change(function(){
            var str = {fenac:$("#fenac").val()}
            $.post('../../sql/alumnos/Edad.php', str, proedad).error(proedad_error);
            function proedad(datos_edad){
                $('#edad').html(datos_edad + " Años");
            }
            function proedad_error(){
                $('#edad').html("Falló la conexión al servidor");
            }
        });
        //Funciones para no permitir numeros negativos
        //Datos del alumno
        $("#peso").change(function() {
            if ($("#peso").val() < 0)
            {
                $("#peso").val(0);
            }
        });
        $("#talla").change(function() {
            if ($("#talla").val() < 0)
            {
                $("#talla").val(0);
            }
        });
        //Funcion de validar formulario
		$("#act-alu").validate({
			submitHandler:function(){
                var str = $("#act-alu").serialize();
                $.post("../../sql/alumnos/Editar.php", str, procesar).error(proerror);
                function procesar(datos){
                    alert(datos);
                }
                function proerror(){
                    alert("Fallo la conexion al servidor, intente mas tarde");
                }
                return false;
            },
			rules:{
				//Datos del Alumno
                nombres:{required:true, letras:true},
                apellidos:{required:true, letras:true},
                fenac:{required:true, date:true},
                sexo:"required",
                peso:{required:true, number:true},
                talla:{required:true, digits:true},
                nac:{required:true, letras:true},
                lugarnac:{required:true, letras:true},
                //Datos del Representante
                nom_rp:{required:true, letras:true},
                ape_rp:{required:true, letras:true},
                tlf_rp:{required:true, digits:true},
                dir_rp:"required",
                email_rp:{required:true, email:true},
                parent_rp:"required"
			},
			messages:{
				//Datos del Alumno
                nombres:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                apellidos:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                fenac:{required:"*Indique el campo", date:"No es una fecha valida"},
                sexo:"*Indique el campo",
                peso:{required:"*Indique el campo", number:"No es un numero"},
                talla:{required:"*Indique el campo", digits:"No es un numero natural"},
                nac:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                lugarnac:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                //Datos del Representante
                nom_rp:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                ape_rp:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                tlf_rp:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                dir_rp:"*Indique el campo",
                email_rp:{required:"*Indique el campo", email:"No es una dirección de email"},
                parent_rp:"*Indique el campo"
			}
		});
        //Metodo para validar solo letras
        jQuery.validator.addMethod("letras", function(value, element) {
          return this.optional(element) || /[A-Z]\D/.test(value);
        }, "Please, write only letters, first letter must be Mayus");
	});
</script>
<?php require '../../templates/admin/header.php'; ?>
<form id="act-alu">
	<table class="form-content">
		<tr>
           <td colspan="4" class="title"><h2 align="center">Datos del alumno</h2></td>
       </tr>
        <tr>
            <td><label for="nombres">Nombres</label></td>
            <td><input type="text" name="nombres" id="nombres" maxlength="50" value="<?php echo $nombres; ?>"></td>
            <td><label for="apellidos">Apellidos</label></td>
            <td><input type="text" name="apellidos" id="apellidos" maxlength="50" value="<?php echo $apellidos; ?>"></td>
        </tr>
        <tr>
            <td><label for="fenac">Fecha de Nacimiento</label></td>
            <td><input type="date" name="fenac" id="fenac" placeholder="año-mes-dia" value="<?php echo $fenac; ?>"></td>
            <td><label for="sexo">Sexo</label></td>
            <td>
                <select name="sexo" id="sexo">
                	<option value="<?php echo $sexo; ?>"><?php echo $sexo; ?></option>
                	<option value="Femenino">Femenino</option>
                	<option value="Masculino">Masculino</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="peso">Peso</label></td>
            <td><input type="text" name="peso" id="peso" value="<?php echo $peso; ?>"></td>
            <td><label for="talla">Talla</label></td>
            <td><input type="number" name="talla" id="talla" maxlength="2" value="<?php echo $talla; ?>"></td>
        </tr>
        <tr>
            <td><label for="nac">Nacionalidad</label></td>
            <td><input type="text" name="nac" id="nac" maxlength="50" value="<?php echo $nac; ?>"></td>
            <td><label for="lugarnac">Lugar de Nacimiento</label></td>
            <td><input type="text" name="lugarnac" id="lugarnac" maxlength="50" value="<?php echo $lugarnac; ?>"></td>
        </tr>
        <tr>
            <td><label>Edad</label></td>
            <td><div id="edad"></div></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4" class="title">
                <h3 align="center">Datos del Representante</h3>
            </td>
        </tr>
         <tr>
            <td><label for="nom_rp">Nombres</label></td>
            <td><input type="text" name="nom_rp" id="nom_rp" maxlength="50" value="<?php echo $nom_rp; ?>"></td>
            <td><label for="ape_rp">Apellidos</label></td>
            <td><input type="text" name="ape_rp" id="ape_rp" maxlength="50" value="<?php echo $ape_rp; ?>"></td>
        </tr>
        <tr>
            <td><label for="tlf_rp">Teléfono</label></td>
            <td><input type="tel" name="tlf_rp" id="tlf_rp" maxlength="11" placeholder="Ej: 02912345678" value="<?php echo $tlf; ?>"></td>
            <td><label for="dir_rp">Dirección</label></td>
            <td><textarea name="dir_rp" id="dir_rp" cols="30" rows="5" maxlength="200"><?php echo $dir; ?></textarea></td>
        </tr>
        <tr>
            <td><label for="email_rp">E-Mail</label></td>
            <td><input type="email" name="email_rp" id="email_rp" maxlength="50" value="<?php echo $email; ?>"></td>
            <td><label for="parent_rp">Parentesco</label></td>
            <td>
                <select name="parent_rp" id="parent_rp">
                    <option value="<?php echo $parent; ?>"><?php echo $parent; ?></option>
                    <option value="Padre">Padre</option>
                    <option value="Madre">Madre</option>
                    <option value="Hermano">Hermano</option>
                    <option value="Hermana">Hermana</option>
                    <option value="Abuelo">Abuelo</option>
                    <option value="Abuela">Abuela</option>
                    <option value="Tío">Tío</option>
                    <option value="Tía">Tía</option>
                </select>
            </td>
        </tr>
        <tr>
        	<td>
        		<input type="hidden" name="admin" value="<?php echo $admin; ?>">
        		<input type="hidden" name="id" value="<?php echo $id; ?>">
        	</td>
        	<td><input type="hidden" name="act"></td>
        	<td><a href="perfil.php?id=<?php echo $id; ?>" class="transparente cancelar"><span>Cancelar</span></a></td>
        	<td><button class="transparente aceptar"><span>Aceptar</span></button></td>
        </tr>
	</table>
</form>
<?php require '../../templates/admin/footer.php'; ?>