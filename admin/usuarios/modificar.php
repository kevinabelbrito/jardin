<?php
require '../../templates/dominio.php';
require '../../sql/Conexion.php';
require '../../sql/Crud.php';
require '../../sql/usuarios/Perfil.php';
require '../../templates/admin/meta.php';
if ($id_admin != $id):
?>
<script>
    alert("¡¡ACCESO DENEGADO!!");
    window.location="../index.php";
</script>
<?php
endif
?>
<title><?php echo "$nombres $apellidos"; ?></title>
<?php require '../../templates/plugins.php'; ?>
<script>
$(function(){
    $("#add-user").validate({
        submitHandler:function(){
        var str = $("#add-user").serialize();
        $.post("../../sql/usuarios/Modificar.php", str, procesar).error(proerror);
        function procesar(datos){
            alert(datos);
        }
        function proerror(){
            alert("Fallo la conexion al servidor, intente mas tarde");
        }
        return false;
        },
        rules:{
            nombres:{required:true, letras:true},
            apellidos:{required:true, letras:true},
            email:{required:true, email:true},
            usuario:"required",
            preg:"required",
            resp:"required",
            tipo:"required"
        },
        messages:{
            nombres:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
            apellidos:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
            email:{required:"*Indique el campo", email:"No es una direccion valida"},
            usuario:"*Indique el campo",
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
                <h2 align="center">Editar mis datos</h2>
            </td>
        </tr>
        <tr>
            <td><label for="nombres">Nombres</label></td>
            <td><input type="text" name="nombres" id="nombres" maxlength="50" value="<?php echo $nombres; ?>"></td>
        </tr>
        <tr>
            <td><label for="apellidos">Apellidos</label></td>
            <td><input type="text" name="apellidos" id="apellidos" maxlength="50" value="<?php echo $apellidos; ?>"></td>
        </tr>
        <tr>
            <td><label for="email">Correo Electrónico</label></td>
            <td><input type="email" name="email" id="email" maxlength="50" value="<?php echo $email; ?>"></td>
        </tr>
        <tr>
            <td><label for="usuario">Usuario</label></td>
            <td><input type="text" name="usuario" id="usuario" maxlength="50" value="<?php echo $usuario; ?>"></td>
        </tr>
        <tr>
            <td><label for="preg">Pregunta de Seguridad</label></td>
            <td>
                <select name="preg" id="preg">
                    <option value="<?php echo $preg; ?>"><?php echo $preg; ?></option>
                    <option value="Lugar donde viajo su primera vez">Lugar donde viajo su primera vez</option>
                    <option value="Escuela donde estudio la secundaria">Escuela donde estudio la secundaria</option>
                    <option value="Nombre de tu mejor amigo">Nombre de tu mejor amigo</option>
                    <option value="Deporte o aficion preferida">Deporte o aficion preferida</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="resp">Respuesta Secreta</label></td>
            <td><input type="text" name="resp" id="resp" maxlength="100" value="<?php echo $resp; ?>"></td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="admin" value="<?php echo $admin; ?>">
                <input type="hidden" name="act">
            </td>
            <td>
                <a class="transparente cancelar" href="../"><span>Salir</span></a>
                <button class="transparente aceptar"><span>Aceptar</span></button>
            </td>
        </tr>
    </table>
</form>
<?php require '../../templates/admin/footer.php'; ?>