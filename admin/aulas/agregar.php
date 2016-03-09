<?php
require '../../templates/dominio.php';
require '../../sql/Conexion.php';
require '../../sql/Crud.php';
require '../../sql/aulas/Docentes.php';
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
<title>Registrar nueva aula</title>
<?php require '../../templates/plugins.php'; ?>
<script>
    $(function(){
        $("#tope").change(function() {
            if ($("#tope").val() < 0)
            {
                $("#tope").val(0);
            }
        });
        $("#add-aula").validate({
            submitHandler:function(){
                var str = $("#add-aula").serialize();
                $.post("../../sql/aulas/Agregar.php", str, procesar).error(proerror);
                function procesar(datos){
                    alert(datos);
                }
                function proerror(){
                    alert("Fallo la conexion al servidor, intente mas tarde");
                }
                //reiniciar el formulario
                $('#add-aula').each (function(){
                  this.reset();
                });
                return false;
            },
            rules:{
                seccion:"required",
                grupo:"required",
                turno:"required",
                tope:{required:true, digits:true, min:10},
                dct:"required",
                desde:{required:true, digits:true}
            },
            messages:{
                seccion:"*Indique el campo",
                grupo:"*Indique el campo",
                turno:"*Indique el campo",
                tope:{required:"*Indique el campo", digits:"Solo numeros naturales", min:"Minimo 10 alumnos por aula"},
                dct:"*Indique el campo",
                desde:{required:"*Indique el campo", digits:"Solo numeros naturales"}
            }
        });
    });
</script>
<?php require '../../templates/admin/header.php'; ?>
<form id="add-aula">
    <table class="form-content">
        <tr>
            <td class="title" colspan="2">
                <h2 align="center">Registro de nueva aula</h2>
            </td>
        </tr> 
        <tr>
            <td><label for="seccion">Sección</label></td>
            <td>
                <select name="seccion" id="seccion">
                    <option value="">-</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="grupo">Grupo</label></td>
            <td>
                <select name="grupo" id="grupo">
                    <option value="">-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="turno">Turno</label></td>
            <td>
                <select name="turno" id="turno">
                    <option value="">-</option>
                    <option value="Mañana">Mañana</option>
                    <option value="Tarde">Tarde</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="tope">Tope</label></td>
            <td><input type="number" name="tope" id="tope"></td>
        </tr>
        <tr>
            <td><label for="dct">Docente</label></td>
            <td>
                <select name="dct" id="dct">
                    <option value="">-</option>
                    <?php foreach ($docentes as $dct):?>
                    <option value="<?php echo $dct['id']; ?>"><?php echo $dct['nombres']; ?> <?php echo $dct['apellidos']; ?></option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;"><label>Periodo Escolar</label></td>
        </tr>
        <tr>
            <td><label for="desde">Desde</label></td>
            <td>
                <select name="desde" id="desde">
                    <option value="">-</option>
                    <?php
                    $year = date("Y");
                    for ($i=0; $i < 5; $i++){
                        $desde = $year +$i;
                    ?>
                    <option value="<?php echo $desde; ?>"><?php echo $desde; ?></option>
                    <?php } ?>
                </select>
            </td>
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