<?php
require 'templates/dominio.php';
require 'templates/login/meta.php';
?>
<title>Recuperar Clave</title>
<?php require 'templates/plugins.php'; ?>
<script>
    $(function(){
        $("#recuperar").validate({
            submitHandler:function(){
                var str = $("#recuperar").serialize();
                $.post("sql/usuarios/Recuperar.php", str, procesar).error(proerror);
                function procesar(datos){
                    alert(datos);
                }
                function proerror(){
                    alert("Fallo la conexion al servidor, intente mas tarde");
                }
                return false;
            },
            rules:{
                email:{required:true, email:true},
                preg:"required",
                resp:"required"
            },
            messages:{
                email:{required:"*Indique el campo", email:"No es una direccion valida"},
                preg:"*Indique el campo",
                resp:"*Indique el campo"
            }
        });
    });
</script>
<?php require 'templates/login/header.php'; ?>
<form id="recuperar">
    <table class="form-content">
        <tr>
            <td><label for="email">Correo Electrónico</label></td>
            <td><input type="email" name="email" id="email" maxlength="50"></td>
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
            <td><input type="hidden" name="recuperar"></td>
            <td>
                <a href="index.php" class="transparente cancelar"><span>Cancelar</span></a>
                <button class="transparente aceptar"><span>Aceptar</span></button>
            </td>
        </tr>
    </table>
</form>
<?php require 'templates/login/footer.php'; ?>