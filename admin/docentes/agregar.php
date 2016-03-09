<?php
require '../../templates/dominio.php';
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
<title>Registrar docente</title>
<?php require '../../templates/plugins.php'; ?>
<script>
    $(function(){
        $("#add-dct").validate({
            submitHandler:function(){
                var str = $("#add-dct").serialize();
                $.post("../../sql/docentes/Agregar.php", str, procesar).error(proerror);
                function procesar(datos){
                    alert(datos);
                }
                function proerror(){
                    alert("Fallo la conexion al servidor, intente mas tarde");
                }
                //reiniciar el formulario
                $('#add-dct').each (function(){
                  this.reset();
                });
                return false;
            },
            rules:{
                nombres:{required:true, letras:true},
                apellidos:{required:true, letras:true},
                nac:"required",
                cedula:{required:true, digits:true},
                tlf:{required:true, digits:true}
            },
            messages:{
                nombres:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                apellidos:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                nac:"*Indique el campo",
                cedula:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                tlf:{required:"*Indique el campo", digits:"Solo numeros naturales"}
            }
        });
        //Metodo para validar solo letras
        jQuery.validator.addMethod("letras", function(value, element) {
          return this.optional(element) || /[A-Z]\D/.test(value);
        }, "Please, write only letters, first letter must be Mayus");
    });
</script>
<?php require '../../templates/admin/header.php'; ?>
<form action="" id="add-dct">
    <table class="form-content">
        <tr>
            <td class="title" colspan="2">
                <h2 align="center">Registro de nuevo docente</h2>
            </td>
        </tr>
        <tr>
            <td><label for="nombres">Nombres</label></td>
            <td><input type="text" name="nombres" id="nombres" maxlength="50"></td>
        </tr>
        <tr>
            <td><label for="apellidos">Apellidos</label></td>
            <td><input type="text" name="apellidos" id="apellidos" maxlength="50"></td>
        </tr>
        <tr>
            <td><label for="cedula">Cedula de Identidad</label></td>
            <td>
                <select name="nac" id="nac">
                    <option value="">-</option>
                    <option value="V">V</option>
                    <option value="E">E</option>
                </select>
                <input type="text" name="cedula" id="cedula" maxlength="10" placeholder="Ej: 12345678">
            </td>
        </tr>
        <tr>
            <td><label for="tlf">Teléfono</label></td>
            <td><input type="tel" name="tlf" id="tlf" maxlength="11" placeholder="Ej: 02912345678"></td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="admin" value="<?php echo $admin; ?>">
                <input type="hidden" name="add">
                <a href="index.php" class="transparente reportes"><span>Lista</span></a>
            </td>
            <td>
                <a href="../" class="transparente cancelar"><span>Cancelar</span></a>
                <button class="transparente aceptar"><span>Aceptar</span></button>
            </td>
        </tr>
    </table>
</form>
<?php require '../../templates/admin/footer.php'; ?>