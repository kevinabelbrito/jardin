<?php
require 'templates/dominio.php';
require 'templates/login/meta.php';
?>
<title>Sistema de Inscripción Jardin de Infancia "Felix Antonio Calderon"</title>
<?php require 'templates/plugins.php'; ?>
<script>
    $(function(){
        $("#login").validate({
            submitHandler:function(){
                var str = $("#login").serialize();
                $("button").html('Cargando...');
                $.post("sql/usuarios/Login.php", str, procesar).error(proerror);
                function procesar(datos){
                    if (datos == 'si')
                    {
                        window.location="admin/";  
                    }
                    else if (datos == 'fallo')
                    {
                        alert("El usuario se encuentra Inhabilitado, para mas información consulte con el administrador");
                        $("#usuario").val("");
                        $("#clave").val("");
                        $("#usuario").focus();
                    }
                    else
                    {
                        alert("El usuario y/o la clave son erroneas");
                        $("#usuario").val("");
                        $("#clave").val("");
                        $("#usuario").focus();
                    }
                }
            function proerror(){
                alert("Fallo la conexion al servidor, intente mas tarde");
            }
            $("button").html("Inicio");
            return false;
            },
            rules:{
                usuario:"required",
                clave:"required"
            },
            messages:{
                usuario:"*Indique el usuario",
                clave:"*Indique la contraseña"
            }
        });
    });
</script>
<?php require 'templates/login/header.php'; ?>
    <form id="login">
        <table class="form-content">
           <tr>
               <td colspan="2" style="text-align:center;"><img src="img/user.png" width="120" height="150"><br><br></td>
           </tr>
            <tr>
                <td><label for="usuario">Usuario:</label></td>
                <td><input type="text" name="usuario" id="usuario"></td>
            </tr>
            <tr>
                <td><label for="clave">Contraseña:</label></td>
                <td><input type="password" name="clave" id="clave"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="login"></td>
                <td><button>Iniciar</button></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <a href="recuperar.php">¿Olvidó su contraseña?</a>
                </td>
            </tr>
        </table>
    </form>
<?php require 'templates/login/footer.php'; ?>