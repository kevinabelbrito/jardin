<?php
require '../../templates/dominio.php';
require '../../sql/Conexion.php';
require '../../sql/Crud.php';
require '../../sql/alumnos/Aulas.php';
require '../../templates/admin/meta.php';
if ($tipo_admin == "Administrador" && $tipo_admin == "Operador"):
?>
<script>
    alert("¡¡ACCESO DENEGADO!!");
    window.location="../index.php";
</script>
<?php
endif
?>
<title>Inscripción de Alumno Regular</title>
<?php require '../../templates/plugins.php'; ?>
<script>
    $(function(){
        $("#ins-reg").hide();
        $(".imprimir").hide();
        $("#validar").validate({
            submitHandler:function(){
                var str = $("#validar").serialize();
                $.getJSON('../../sql/alumnos/Regular.php', str, procesar).error(proerror);;
                function procesar(datos){
                    if (datos.failed)
                    {
                        alert("No se encontró ningun alumno");
                        $("#ins-reg").hide();
                        $(".imprimir").hide();
                    }
                    else
                    {
                        $("#ins-reg").show();
                        $("#nombres").html(datos.nombres);
                        $("#apellidos").html(datos.apellidos);
                        $("#fenac").html(datos.fenac);
                        $("#sexo").html(datos.sexo);
                        $("#nac").html(datos.nac);
                        $("#lugarnac").html(datos.lugarnac);
                        $("#feins").html(datos.feins);
                        $("#historial").html(datos.historial);
                        $("#ced_alu").val(datos.cedula);
                        $(".imprimir").attr('href', 'reporte-regular.php?cedula='+datos.cedula);
                    }
                }
                function proerror(){
                    alert("Fallo la conexion al servidor, intente mas tarde");
                }
                return false;
            },
            rules:{
                cedula:{required:true, digits:true}
            },
            messages:{
                cedula:{
                    required:"*Indique la cedula escolar",
                    digits:"Solo numeros naturales"
                }
            }
        });
        $("#regular").validate({
            submitHandler:function(){
                var str = $("#regular").serialize();
                $.post("../../sql/alumnos/Regular.php", str, procesar).error(proerror);
                function procesar(datos){
                    alert(datos);
                    $(".imprimir").show();
                }
                function proerror(){
                    alert("Fallo la conexion al servidor, intente mas tarde");
                }
                return false;
            },
            rules:{
                aula:"required"
            },
            messages:{
                aula:"*Indique el aula"
            }
        });
    });
</script>
<?php require '../../templates/admin/header.php'; ?>
<form id="validar" method="post">
    <table class="form-content">
        <tr>
            <td><label for="cedula">Cedula Escolar</label></td>
            <td><input type="text" name="cedula" id="cedula" maxlength="10"></td>
        </tr>
        <tr>
            <td></td>
            <td><button>Verificar</button></td>
        </tr>
    </table>
</form>
<div id="ins-reg">
    <table class="list" border="1">
        <tr>
            <td colspan="2"><b>Datos del Alumno</b></td>
        </tr>
        <tr>
            <td><b>Nombres</b></td>
            <td><div id="nombres"></div></td>
        </tr>
        <tr>
            <td><b>Apellidos</b></td>
            <td><div id="apellidos"></div></td> 
        </tr>
        <tr>
            <td><b>Fecha de Nacimiento</b></td>
            <td><div id="fenac"></div></td>
        </tr>
        <tr>
            <td><b>Sexo</b></td>
            <td><div id="sexo"></div></td>
        </tr>
        <tr>
            <td><b>Nacionalidad</b></td>
            <td><div id="nac"></div></td>
        </tr>
        <tr>
            <td><b>Lugar de Nacimiento</b></td>
            <td><div id="lugarnac"></div></td>
        </tr>
        <tr>
            <td><b>Fecha de Ultima inscripción</b></td>
            <td><div id="feins"></div></td>
        </tr>
    </table>
    <div id="historial" align="center"></div>
    <form id="regular">
        <table class="form-content">
            <tr>
                <td><label for="aula">Aula</label></td>
                <td>
                    <select name="aula" id="aula">
                        <option value="">-</option>
                        <?php foreach ($aulas as $aula):?>
                        <option value="<?php echo $aula['id']; ?>">Sección:<?php echo $aula['seccion']; ?> | Grupo:<?php echo $aula['grupo']; ?> | Turno:<?php echo $aula['turno']; ?> | Periodo:<?php echo $aula['desde']; ?>-<?php echo $aula['hasta']; ?></option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="admin" value="<?php echo $admin; ?>">
                    <input type="hidden" name="ced_alu" id="ced_alu">
                </td>
                <td>
                    <button class="transparente aceptar"><span>Aceptar</span></button>
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="options">
    <a href="" class="imprimir" target="_blank"><span>Imprimir reporte de inscripción</span></a>
    <a href="index.php" class="exit"><span>Salir</span></a>
</div>
<?php require '../../templates/admin/footer.php'; ?>