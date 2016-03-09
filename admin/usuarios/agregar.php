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
<title>Agregar un nuevo usuario</title>
<?php require '../../templates/plugins.php'; ?>
<script>
$(function(){
    $("#add-user").validate({
        submitHandler:function(){
        var str = $("#add-user").serialize();
        $.post("../../sql/usuarios/Agregar.php", str, procesar).error(proerror);
        function procesar(datos){
            alert(datos);
        }
        function proerror(){
            alert("Fallo la conexion al servidor, intente mas tarde");
        }
        //reiniciar el formulario
        $('#add-user').each (function(){
          this.reset();
        });
        return false;
        },
        rules:{
            nombres:{required:true, letras:true},
            apellidos:{required:true, letras:true},
            email:{required:true, email:true},
            usuario:"required",
            clave:{required:true, minlength:6},
            conf:{required:true, equalTo:"#clave"},
            preg:"required",
            resp:"required",
            tipo:"required"
        },
        messages:{
            nombres:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
            apellidos:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
            email:{required:"*Indique el campo", email:"No es una direccion valida"},
            usuario:"*Indique el campo",
            clave:{required:"*Indique el campo", minlength:"Minimo 6 caracteres"},
            conf:{required:"*Indique el campo", equalTo:"Las claves deben coincidir"},
            preg:"*Indique el campo",
            resp:"*Indique el campo",
            tipo:"*Indique el campo"
        }
    });
    //Metodo para validar solo letras
    jQuery.validator.addMethod("letras", function(value, element) {
      return this.optional(element) || /[A-Z]\D/.test(value);
    }, "Please, write only letters, first letter must be Mayus");
});
</script>
<?php require '../../templates/admin/header.php'; ?>
<form id="add-user">
    <table class="form-content">
        <tr>
            <td class="title" colspan="2">
                <h2 align="center">Registrar Usuario</h2>
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
            <td><label for="email">Correo Electrónico</label></td>
            <td><input type="email" name="email" id="email" maxlength="50"></td>
        </tr>
        <tr>
            <td><label for="usuario">Usuario</label></td>
            <td><input type="text" name="usuario" id="usuario" maxlength="50"></td>
        </tr>
        <tr>
            <td><label for="clave">Clave</label></td>
            <td><input type="password" name="clave" id="clave" maxlength="20"></td>
        </tr>
        <tr>
            <td><label for="conf">Confirmar Clave</label></td>
            <td><input type="password" name="conf" id="conf" maxlength="20"></td>
        </tr>
        <tr>
            <td><label for="tipo">Tipo de Usuario</label></td>
            <td>
                <select name="tipo" id="tipo">
                    <option value="">-</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Operador">Operador</option>
                    <option value="Auxiliar">Auxiliar</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="preg">Pregunta de Seguridad</label></td>
            <td>
                <select name="preg" id="preg">
                    <option value="">-</option>
                    <option value="Lugar donde viajo su primera vez">Lugar donde viajo su primera vez</option>
                    <option value="Escuela donde estudio la secundaria">Escuela donde estudio la secundaria</option>
                    <option value="Nombre de tu mejor amigo">Nombre de tu mejor amigo</option>
                    <option value="Deporte o aficion preferida">Deporte o aficion preferida</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="resp">Respuesta Secreta</label></td>
            <td><input type="text" name="resp" id="resp" maxlength="100"></td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="admin" value="<?php echo $admin; ?>">
                <input type="hidden" name="add">
                <a href="index.php" class="transparente reportes"><span>Lista</span></a>
            </td>
            <td>
                <a class="transparente cancelar" href="../"><span>Cancelar</span></a>
                <button class="transparente aceptar"><span>Aceptar</span></button>
            </td>
        </tr>
    </table>
</form>
<?php require '../../templates/admin/footer.php'; ?>