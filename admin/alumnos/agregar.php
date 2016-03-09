<?php
require '../../templates/dominio.php';
require '../../sql/Conexion.php';
require '../../sql/Crud.php';
require '../../sql/alumnos/Aulas.php';
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
<title>Inscripción de nuevo alumno</title>
<?php require '../../templates/plugins.php'; ?>
<script>
    $(function(){
        //Ocultar el boton de imprimir
        $(".imprimir").hide();
        //Funciones para mostrar la edad
        $("#fenac").change(function(){
            var str = {fenac:$("#fenac").val()}
            $.post('../../sql/alumnos/Edad.php', str, proedad).error(proedad_error);
            function proedad(datos_edad){
                if (datos_edad >= 2)
                {
                    $('#edad').html(datos_edad + " Años");
                }
                else
                {
                    $('#edad').html("Debe tener al menos 2 años");
                }
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
        //Personas q viven en el hogar
        $("#n_hnos").change(function() {
            if ($("#n_hnos").val() < 0)
            {
                $("#n_hnos").val(0);
            }
        });
        $("#n_abl").change(function() {
            if ($("#n_abl").val() < 0)
            {
                $("#n_abl").val(0);
            }
        });
        $("#n_tios").change(function() {
            if ($("#n_tios").val() < 0)
            {
                $("#n_tios").val(0);
            }
        });
        $("#n_otr").change(function() {
            if ($("#n_otr").val() < 0)
            {
                $("#n_otr").val(0);
            }
        });
        //Distribucion de la vivienda
        $("#dormi").change(function() {
            if ($("#dormi").val() < 0)
            {
                $("#dormi").val(0);
            }
        });
        $("#cocina").change(function() {
            if ($("#cocina").val() < 0)
            {
                $("#cocina").val(0);
            }
        });
        $("#bano").change(function() {
            if ($("#bano").val() < 0)
            {
                $("#bano").val(0);
            }
        });
        $("#comedor").change(function() {
            if ($("#comedor").val() < 0)
            {
                $("#comedor").val(0);
            }
        });
        //Desarrollo Lenguaje y Motor
        $("#hbl").change(function() {
            if ($("#hbl").val() < 0)
            {
                $("#hbl").val(0);
            }
        });
        $("#cam").change(function() {
            if ($("#cam").val() < 0)
            {
                $("#cam").val(0);
            }
        });
        //Funcion de validar formulario
        $("#add-alum").validate({
            submitHandler:function(){
                var str = $("#add-alum").serialize();
                $.post("../../sql/alumnos/Agregar.php", str, procesar).error(proerror);
                function procesar(datos){
                    alert(datos);
                    var ced_alu = $("#cedula").val();
                    $(".imprimir").show().attr('href', 'reporte-nuevo.php?cedula='+ced_alu);
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
                edad:{required:true, min:2},
                //Datos de la seccion
                cedula:{required:true, digits:true},
                aula:"required",
                //Datos del Representante
                nom_rp:{required:true, letras:true},
                ape_rp:{required:true, letras:true},
                tlf_rp:{required:true, digits:true},
                dir_rp:"required",
                email_rp:{required:true, email:true},
                parent_rp:"required",
                //Datos de la Madre
                nom_ma:{required:true, letras:true},
                ape_ma:{required:true, letras:true},
                ced_ma:"required",
                nac_ma:"required",
                ec_ma:"required",
                tlf_ma:{required:true, digits:true},
                ocp_ma:{required:true, letras:true},
                ingreso_ma:{required:true, number:true},
                dir_ma:"required",
                email_ma:{required:true, email:true},
                //Datos del Padre
                nom_pd:{required:true, letras:true},
                ape_pd:{required:true, letras:true},
                ced_pd:"required",
                nac_pd:"required",
                ec_pd:"required",
                tlf_pd:{required:true, digits:true},
                ocp_pd:{required:true, letras:true},
                ingreso_pd:{required:true, number:true},
                dir_pd:"required",
                email_pd:{required:true, email:true},
                //Contacto de Emergencia
                nom_em:{required:true, letras:true},
                ape_em:{required:true, letras:true},
                tlf_em:{required:true, digits:true},
                parent_em:"required",
                //AMBIENTE SOCIO-FAMILIAR
                //Personas que viven en el hogar
                padre:"required",
                madre:"required",
                n_hnos:{required:true, digits:true},
                n_abl:{required:true, digits:true},
                n_tios:{required:true, digits:true},
                n_otr:{required:true, digits:true},
                //Características de la vivienda
                tipo:"required",
                material:"required",
                //Distribucion de la vivienda
                dormi:{required:true, digits:true},
                cocina:{required:true, digits:true},
                bano:{required:true, digits:true},
                comedor:{required:true, digits:true},
                //Tendencia de la vivienda
                tend:"required",
                //Cuidados del alumno
                cuida:"required",
                cdobs:"required",
                //Asistencias del alumno
                asis:"required",
                //Orientacion del alumno
                orien:"required",
                //Relaciones del alumno
                padres:"required",
                hnos:"required",
                flia:"required",
                amg:"required",
                //Consultas a las que ha asistido
                consulta:"required",
                pq:"required",
                //Antecedentes Prenatales
                plan:"required",
                trab:"required",
                tipo_trab:"required",
                suf:"required",
                gs:"required",
                //Antecedentes Para-natales
                parto:"required",
                edad:{required:true, digits:true},
                prob:"required",
                //Antecedentes Post-natales
                peso_nac:{required:true, number:true},
                talla_nac:{required:true, number:true},
                prob_nac:"required",
                causa:"required",
                //Desarrollo Lenguaje y Motor
                hbl:{required:true, digits:true},
                cam:{required:true, digits:true},
                mano:"required",
                //Condiciones del alumno
                cual:"required",
                causa_cond:"required",
                control:"required",
                //Salud del alumno
                gs_alu:"required",
                hosp:"required",
                hcs:"required",
                alg:"required",
                acs:"required"
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
                edad:{required:"*Indique el campo", min:"No se puede inscribir el alumno"},
                //Datos de la seccion
                cedula:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                aula:"*Indique el campo",
                //Datos del Representante
                nom_rp:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                ape_rp:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                tlf_rp:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                dir_rp:"*Indique el campo",
                email_rp:{required:"*Indique el campo", email:"No es una dirección de email"},
                parent_rp:"*Indique el campo",
                //Datos de la Madre
                nom_ma:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                ape_ma:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                ced_ma:"*Indique el campo",
                nac_ma:"*Indique el campo",
                ec_ma:"*Indique el campo",
                tlf_ma:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                ocp_ma:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                ingreso_ma:{required:"*Indique el campo", number:"Solo numeros"},
                dir_ma:"*Indique el campo",
                email_ma:{required:"*Indique el campo", email:"No es una dirección de email"},
                //Datos del Padre
                nom_pd:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                ape_pd:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                ced_pd:"*Indique el campo",
                nac_pd:"*Indique el campo",
                ec_pd:"*Indique el campo",
                tlf_pd:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                ocp_pd:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                ingreso_pd:{required:"*Indique el campo", number:"Solo numeros"},
                dir_pd:"*Indique el campo",
                email_pd:{required:"*Indique el campo", email:"No es una dirección de email"},
                //Contacto de Emergencia
                nom_em:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                ape_em:{required:"*Indique el campo", letras:"Solo letras (Primera en Mayuscula)"},
                tlf_em:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                parent_em:"*Indique el campo",
                //AMBIENTE SOCIO-FAMILIAR
                //Personas que viven en el hogar
                padre:"*Indique el campo",
                madre:"*Indique el campo",
                n_hnos:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                n_abl:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                n_tios:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                n_otr:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                //Características de la vivienda
                tipo:"*Indique el campo",
                material:"*Indique el campo",
                //Distribucion de la vivienda
                dormi:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                cocina:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                bano:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                comedor:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                //Tendencia de la vivienda
                tend:"*Indique el campo",
                //Cuidados del alumno
                cuida:"*Indique el campo",
                cdobs:"*Indique el campo",
                //Asistencias del alumno
                asis:"*Indique el campo",
                //Orientacion del alumno
                orien:"*Indique el campo",
                //Relaciones del alumno
                padres:"*Indique el campo",
                hnos:"*Indique el campo",
                flia:"*Indique el campo",
                amg:"*Indique el campo",
                //Consultas a las que ha asistido
                consulta:"*Indique el campo",
                pq:"*Indique el campo",
                //Antecedentes Prenatales
                plan:"*Indique el campo",
                trab:"*Indique el campo",
                tipo_trab:"*Indique el campo",
                suf:"*Indique el campo",
                gs:"*Indique el campo",
                //Antecedentes Para-natales
                parto:"*Indique el campo",
                edad:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                prob:"*Indique el campo",
                //Antecedentes Post-natales
                peso_nac:{required:"*Indique el campo", number:"Solo numeros"},
                talla_nac:{required:"*Indique el campo", number:"Solo numeros"},
                prob_nac:"*Indique el campo",
                causa:"*Indique el campo",
                //Desarrollo Lenguaje y Motor
                hbl:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                cam:{required:"*Indique el campo", digits:"Solo numeros naturales"},
                mano:"*Indique el campo",
                //Condiciones del alumno
                cual:"*Indique el campo",
                causa_cond:"*Indique el campo",
                control:"*Indique el campo",
                //Salud del alumno
                gs_alu:"*Indique el campo",
                hosp:"*Indique el campo",
                hcs:"*Indique el campo",
                alg:"*Indique el campo",
                acs:"*Indique el campo"
            },
            errorPlacement: function(error, element){
                if(element.is(":radio") || element.is(":checkbox"))
                {
                    error.appendTo(element.parent());
                }
                else
                {
                    error.insertAfter(element);
                }
            }
        });
        //Metodo para validar solo letras
        jQuery.validator.addMethod("letras", function(value, element) {
          return this.optional(element) || /[A-Z]\D/.test(value);
        }, "Please, write only letters, first letter must be Mayus");
    });
</script>
<?php require '../../templates/admin/header.php'; ?>
<form id="add-alum">
    <table class="form-content">
       <tr>
           <td colspan="4" class="title"><h2 align="center">Inscripción de Nuevo Alumno</h2></td>
       </tr>
        <tr>
            <td><label for="nombres">Nombres</label></td>
            <td><input type="text" name="nombres" id="nombres" maxlength="50"></td>
            <td><label for="apellidos">Apellidos</label></td>
            <td><input type="text" name="apellidos" id="apellidos" maxlength="50"></td>
        </tr>
        <tr>
            <td><label for="fenac">Fecha de Nacimiento</label></td>
            <td><input type="date" name="fenac" id="fenac" placeholder="año-mes-dia"></td>
            <td><label>Sexo</label></td>
            <td>
                <input type="radio" name="sexo" id="f" value="Femenino">
                <label for="f">Femenino</label>
                <input type="radio" name="sexo" id="m" value="Masculino">
                <label for="m">Masculino</label>
            </td>
        </tr>
        <tr>
            <td><label for="peso">Peso</label></td>
            <td><input type="text" name="peso" id="peso"></td>
            <td><label for="talla">Talla</label></td>
            <td><input type="number" name="talla" id="talla" maxlength="2"></td>
        </tr>
        <tr>
            <td><label for="nac">Nacionalidad</label></td>
            <td><input type="text" name="nac" id="nac" maxlength="50"></td>
            <td><label for="lugarnac">Lugar de Nacimiento</label></td>
            <td><input type="text" name="lugarnac" id="lugarnac" maxlength="50"></td>
        </tr>
        <tr>
            <td><label>Edad</label></td>
            <td><div id="edad"></div></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4" class="title"><h3 align="center">Datos de la sección</h3></td>
        </tr>
        <tr>
            <td><label for="cedula">Cedula Escolar</label></td>
            <td><input type="text" name="cedula" id="cedula" maxlength="10"></td>
            <td colspan="2">
                <label for="aula">Aula</label>
                <select name="aula" id="aula">
                    <option value="">-</option>
                    <?php foreach ($aulas as $aula):?>
                    <option value="<?php echo $aula['id'] ?> ">Sección:<?php echo $aula['seccion'] ?> | Grupo:<?php echo $aula['grupo']; ?> | Turno:<?php echo $aula['turno'] ?>  | Periodo Escolar:<?php echo $aula['desde'] ?>-<?php echo $aula['hasta'] ?></option>
                    <?php endforeach ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="title">
                <h3 align="center">Datos del Representante</h3>
            </td>
        </tr>
        <tr>
            <td><label for="nom_rp">Nombres</label></td>
            <td><input type="text" name="nom_rp" id="nom_rp" maxlength="50"></td>
            <td><label for="ape_rp">Apellidos</label></td>
            <td><input type="text" name="ape_rp" id="ape_rp" maxlength="50"></td>
        </tr>
        <tr>
            <td><label for="tlf_rp">Teléfono</label></td>
            <td><input type="tel" name="tlf_rp" id="tlf_rp" maxlength="11" placeholder="Ej: 02912345678"></td>
            <td><label for="dir_rp">Dirección</label></td>
            <td><textarea name="dir_rp" id="dir_rp" cols="30" rows="5" maxlength="200"></textarea></td>
        </tr>
        <tr>
            <td><label for="email_rp">E-Mail</label></td>
            <td><input type="email" name="email_rp" id="email_rp" maxlength="50"></td>
            <td><label for="parent_rp">Parentesco</label></td>
            <td>
                <select name="parent_rp" id="parent_rp">
                    <option value="">-</option>
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
            <td colspan="4" class="title">
                <h3 align="center">Datos de la Madre</h3>
            </td>
        </tr>
        <tr>
            <td><label for="nom_ma">Nombres</label></td>
            <td><input type="text" name="nom_ma" id="nom_ma" maxlength="50"></td>
            <td><label for="ape_ma">Apellidos</label></td>
            <td><input type="text" name="ape_ma" id="ape_ma" maxlength="50"></td>
        </tr>
        <tr>
            <td><label for="ced_ma">Cedula de Identidad</label></td>
            <td><input type="text" name="ced_ma" id="ced_ma" maxlength="10" placeholder="Ej: V12345678"></td>
            <td><label for="nac_ma">Nacionalidad</label></td>
            <td><input type="text" name="nac_ma" id="nac_ma" maxlength="50"></td>
        </tr>
        <tr>
            <td><label for="ec_ma">Edo. Civil</label></td>
            <td>
                <select name="ec_ma" id="ec_ma">
                    <option value="">-</option>
                    <option value="Soltera">Soltera</option>
                    <option value="Casada">Casada</option>
                    <option value="Divorciada">Divorciada</option>
                    <option value="Viuda">Viuda</option>
                    <option value="Concubinato">Concubinato</option>
                </select>
            </td>
            <td><label for="tlf_ma">Teléfono</label></td>
            <td><input type="tel" name="tlf_ma" id="tlf_ma" maxlength="11"></td>
        </tr>
        <tr>
            <td><label for="ocp_ma">Ocupación</label></td>
            <td><input type="text" name="ocp_ma" id="ocp_ma" maxlength="50"></td>
            <td><label for="ingreso_ma">Ingreso Mensual</label></td>
            <td><input type="text" name="ingreso_ma" id="ingreso_ma"></td>
        </tr>
        <tr>
            <td><label for="dir_ma">Dirección</label></td>
            <td><textarea name="dir_ma" id="dir_ma" cols="30" rows="5"></textarea></td>
            <td><label for="email_ma">E-Mail</label></td>
            <td><input type="email" name="email_ma" id="email_ma" maxlength="50"></td>
        </tr>
        <tr>
            <td colspan="4" class="title">
                <h3 align="center">Datos del Padre</h3>
            </td>
        </tr>
        <tr>
            <td><label for="nom_pd">Nombres</label></td>
            <td><input type="text" name="nom_pd" id="nom_pd" maxlength="50"></td>
            <td><label for="ape_pd">Apellidos</label></td>
            <td><input type="text" name="ape_pd" id="ape_pd" maxlength="50"></td>
        </tr>
        <tr>
            <td><label for="ced_pd">Cedula de Identidad</label></td>
            <td><input type="text" name="ced_pd" id="ced_pd" maxlength="10" placeholder="Ej: V12345678"></td>
            <td><label for="nac_pd">Nacionalidad</label></td>
            <td><input type="text" name="nac_pd" id="nac_pd" maxlength="50"></td>
        </tr>
        <tr>
            <td><label for="ec_pd">Edo. Civil</label></td>
            <td>
                <select name="ec_pd" id="ec_pd">
                    <option value="">-</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Divorciado">Divorciado</option>
                    <option value="Viudo">Viudo</option>
                    <option value="Concubinato">Concubinato</option>
                </select>
            </td>
            <td><label for="tlf_pd">Teléfono</label></td>
            <td><input type="tel" name="tlf_pd" id="tlf_pd" maxlength="11"></td>
        </tr>
        <tr>
            <td><label for="ocp_pd">Ocupación</label></td>
            <td><input type="text" name="ocp_pd" id="ocp_pd" maxlength="50"></td>
            <td><label for="ingreso_pd">Ingreso Mensual</label></td>
            <td><input type="text" name="ingreso_pd" id="ingreso_pd"></td>
        </tr>
        <tr>
            <td><label for="dir_pd">Dirección</label></td>
            <td><textarea name="dir_pd" id="dir_pd" cols="30" rows="5"></textarea></td>
            <td><label for="email_pd">E-Mail</label></td>
            <td><input type="email" name="email_pd" id="email_pd" maxlength="50"></td>
        </tr>
        <tr>
            <td colspan="4" class="title">
                <h3 align="center">Contacto de Emergencia</h3>
            </td>
        </tr>
        <tr>
            <td><label for="nom_em">Nombres</label></td>
            <td><input type="text" name="nom_em" id="nom_em" maxlength="50"></td>
            <td><label for="ape_em">Apellidos</label></td>
            <td><input type="text" name="ape_em" id="ape_em" maxlength="50"></td>
        </tr>
        <tr>
            <td><label for="tlf_em">Teléfono</label></td>
            <td><input type="tel" name="tlf_em" id="tlf_em" maxlength="11"></td>
            <td><label for="parent_em">Parentesco</label></td>
            <td>
                <select name="parent_em" id="parent_em">
                    <option value="">-</option>
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
            <td colspan="4" class="title">
                <h3 align="center">Ambiente Socio-Familiar</h3>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <label>a. Personas que viven en el hogar</label>
            </td>
        </tr>
        <tr>
            <td><label for="padre">Padre</label></td>
            <td>
                <select name="padre" id="padre">
                    <option value="">-</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </td>
            <td><label for="madre">Madre</label></td>
            <td>
                <select name="madre" id="madre">
                    <option value="">-</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="n_hnos">Hermanos</label></td>
            <td><input type="number" name="n_hnos" id="n_hnos"></td>
            <td><label for="n_abl">Abuelos</label></td>
            <td><input type="number" name="n_abl" id="n_abl"></td>
        </tr>
        <tr>
            <td><label for="n_tios">Tíos</label></td>
            <td><input type="number" name="n_tios" id="n_tios"></td>
            <td><label for="n_otr">Otros</label></td>
            <td><input type="number" name="n_otr" id="n_otr"></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <label>b. Características de la vivienda</label>
            </td>
        </tr>
        <tr>
            <td><label for="tipo">Tipo de Construcción</label></td>
            <td>
                <select name="tipo" id="tipo">
                    <option value="">-</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Casa">Casa</option>
                    <option value="Rancho">Rancho</option>
                </select>
            </td>
            <td><label for="material">Material</label></td>
            <td>
                <select name="material" id="material">
                    <option value="">-</option>
                    <option value="Bloque">Bloque</option>
                    <option value="Cartón">Cartón</option>
                    <option value="Madera">Madera</option>
                    <option value="Zinc">Zinc</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <label>c. Distribución de la vivienda</label>
            </td>
        </tr>
        <tr>
            <td><label for="dormi">Dormitorios</label></td>
            <td><input type="number" name="dormi" id="dormi" maxlength="1"></td>
            <td><label for="cocina">Cocina</label></td>
            <td><input type="number" name="cocina" id="cocina" maxlength="1"></td>
        </tr>
        <tr>
            <td><label for="bano">Baño</label></td>
            <td><input type="number" name="bano" id="bano" maxlength="1"></td>
            <td><label for="comedor">Comedor</label></td>
            <td><input type="number" name="comedor" id="comedor"></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <label for="tend">d. Tendencia de la vivienda</label>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <select name="tend" id="tend">
                    <option value="">-</option>
                    <option value="Propia">Propia</option>
                    <option value="Alquilada">Alquilada</option>
                    <option value="Con opción a compra">Con opción a compra</option>
                    <option value="Invasión">Invasión</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <label>e. ¿Quién cuida al alumno durante el tiempo que permanece en el hogar?</label>
            </td>
        </tr>
        <tr>
            <td><label for="cuida">Parentesco</label></td>
            <td>
                <select name="cuida" id="cuida">
                    <option value="">-</option>
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
            <td><label for="cdobs">Observaciones</label></td>
            <td><textarea name="cdobs" id="cdobs" cols="30" rows="5"></textarea></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <label for="asis">f. ¿Ha asistido anteriormente al prescolar?</label>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <select name="asis" id="asis">
                    <option value="">-</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <label for="orien">g. ¿Ha orientado al alumno con respecto a su ingreso a la institución? ¿Cómo?</label>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <textarea name="orien" id="orien" cols="60" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <label>h. Como son sus relaciones</label>
            </td>
        </tr>
        <tr>
            <td><label for="padres">Padres</label></td>
            <td>
                <select name="padres" id="padres">
                    <option value="">-</option>
                    <option value="Armónica">Armónica</option>
                    <option value="Cordial">Cordial</option>
                    <option value="Tensa">Tensa</option>
                    <option value="Agresiva">Agresiva</option>
                    <option value="Indiferente">Indiferente</option>
                </select>
            </td>
            <td><label for="hnos">Hermanos</label></td>
            <td>
                <select name="hnos" id="hnos">
                    <option value="">-</option>
                    <option value="Armónica">Armónica</option>
                    <option value="Cordial">Cordial</option>
                    <option value="Tensa">Tensa</option>
                    <option value="Agresiva">Agresiva</option>
                    <option value="Indiferente">Indiferente</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="flia">Familia</label></td>
            <td>
                <select name="flia" id="flia">
                    <option value="">-</option>
                    <option value="Armónica">Armónica</option>
                    <option value="Cordial">Cordial</option>
                    <option value="Tensa">Tensa</option>
                    <option value="Agresiva">Agresiva</option>
                    <option value="Indiferente">Indiferente</option>
                </select>
            </td>
            <td><label for="amg">Amigos</label></td>
            <td>
                <select name="amg" id="amg">
                    <option value="">-</option>
                    <option value="Armónica">Armónica</option>
                    <option value="Cordial">Cordial</option>
                    <option value="Tensa">Tensa</option>
                    <option value="Agresiva">Agresiva</option>
                    <option value="Indiferente">Indiferente</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <label>i. ¿Ha asistido alguna vez a consulta con?</label>
            </td>
        </tr>
        <tr>
            <td><label for="consulta">Especialista</label></td>
            <td>
                <select name="consulta" id="consulta">
                    <option value="">-</option>
                    <option value="Psicólogos">Psicólogos</option>
                    <option value="Psico-pedagogos">Psico-pedagogos</option>
                    <option value="Neurólogos">Neurólogos</option>
                    <option value="Terapista de Lenguaje">Terapista de Lenguaje</option>
                </select>
            </td>
            <td><label for="pq">¿Porqué?</label></td>
            <td><textarea name="pq" id="pq" cols="30" rows="5"></textarea></td>
        </tr>
        <tr>
            <td colspan="4" class="title">
                <h3 align="center">Antecedentes Prenatales</h3>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <label>a. ¿Embarazo Planificado?</label>
            </td>
            <td colspan="2" style="text-align:center;">
                <label>b. enfermedades sufridas durante el embarazo</label>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <input type="radio" name="plan" id="yes" value="Si">
                <label for="yes">Si</label>
                <input type="radio" name="plan" id="nou" value="No">
                <label for="nou">No</label>
            </td>
            <td colspan="2" style="text-align:center;">
                <input type="checkbox" name="enf[]" id="enf_rub" value="Rubéola">
                <label for="enf_rub">Rubéola</label>
                <br>
                <input type="checkbox" name="enf[]" id="enf_ane" value="Anemia">
                <label for="enf_ane">Anemia</label>
                <br>
                <input type="checkbox" name="enf[]" id="enf_tox" value="Toxoplasmosis">
                <label for="enf_tox">Toxoplasmosis</label>
                <br>
                <input type="checkbox" name="enf[]" id="enf_hip" value="Hipertensión">
                <label for="enf_hip">Hipertensión</label>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <label>c. ¿Trabajó la madre durante el embarazo?</label>
            </td>
            <td colspan="2" style="text-align:center;">
                <label for="tipo_trab">d. Tipo de trabajo</label>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <input type="radio" name="trab" id="yes_trab" value="Si">
                <label for="yes_trab">Si</label>
                <input type="radio" name="trab" id="no_trab" value="No">
                <label for="no_trab">No</label>
            </td>
            <td colspan="2" style="text-align:center;">
                <select name="tipo_trab" id="tipo_trab">
                    <option value=""></option>
                    <option value="Profesional">Profesional</option>
                    <option value="Oficio">Oficio</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <label>e. ¿Sufrió la madre durante el embarazo?</label>
            </td>
            <td colspan="2" style="text-align:center;">
                <label for="gs">f. Grupo sanguíneo</label>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <input type="radio" name="suf" id="yes_suf" value="Si">
                <label for="yes_suf">Si</label>
                <input type="radio" name="suf" id="no_suf" value="No">
                <label for="no_suf">No</label>
            </td>
            <td colspan="2" style="text-align:center;">
                <select name="gs" id="gs">
                    <option value="">-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="A-">A-</option>
                    <option value="A+">A+</option>
                    <option value="B-">B-</option>
                    <option value="B+">B+</option>
                    <option value="AB-">AB-</option>
                    <option value="AB+">AB+</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="title">
                <h3 align="center">Antecedentes Para-natales</h3>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <label for="parto">a. ¿Cómo fue el parto?</label>
            </td>
            <td colspan="2" style="text-align:center;">
                <label for="edad">b. Edad de la madre al momento del parto</label>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <select name="parto" id="parto">
                    <option value="">-</option>
                    <option value="Natural">Natural</option>
                    <option value="Cesária">Cesária</option>
                    <option value="A término">A término</option>
                    <option value="Prematuro">Prematuro</option>
                    <option value="Forcé">Forcé</option>
                </select>
            </td>
            <td colspan="2" style="text-align:center;">
                <input type="text" name="edad" id="edad" maxlength="2">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <label>c. Surgió algún problema durante el parto</label>
            </td>
            <td colspan="2" style="text-align:center;"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <input type="radio" name="prob" id="yes_prob" value="Si">
                <label for="yes_prob">Si</label>
                <input type="radio" name="prob" id="no_prob" value="No">
                <label for="no_prob">No</label>
            </td>
            <td colspan="2" style="text-align:center;"></td>
        </tr>
        <tr>
            <td colspan="4" class="title">
                <h3 align="center">Antecedentes Post-natales</h3>
            </td>
        </tr>
        <tr>
            <td><label for="peso_nac">a. Peso(Grs)</label></td>
            <td><input type="text" name="peso_nac" id="peso_nac"></td>
            <td><label for="talla_nac">Talla(Cms)</label></td>
            <td><input type="text" name="talla_nac" id="talla_nac"></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <label>b. ¿Presento algún problema en los primeros días del nacimiento? </label>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <input type="radio" name="prob_nac" id="yes_nac" value="Si">
                <label for="yes_nac">Si</label>
                <input type="radio" name="prob_nac" id="no_nac" value="No">
                <label for="no_nac">No</label>
            </td>
            <td><label for="causa">Causa</label></td>
            <td><textarea name="causa" id="causa" cols="30" rows="5"></textarea></td>
        </tr>
        <tr>
            <td colspan="4" class="title">
                <h3 align="center">Desarrollo Lenguaje y Motor</h3>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <label for="hbl">Edad aproximada cuando empezó hablar(Meses)</label>
            </td>
            <td><input type="number" name="hbl" id="hbl"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <label for="cam">Edad aproximada cuando empezó a caminar(Meses)</label>
            </td>
            <td><input type="number" name="cam" id="cam"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <label for="mano">Mano que utiliza frecuentemente</label>
            </td>
            <td>
                <select name="mano" id="mano">
                    <option value="">-</option>
                    <option value="Izquierda">Izquierda</option>
                    <option value="Derecha">Derecha</option>
                    <option value="Ambas">Ambas</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="title">
                <h3 align="center">¿Presenta alguna condición?</h3>
            </td>
        </tr>
        <tr>
            <td><label for="cual">¿Cual?</label></td>
            <td><input type="text" name="cual" id="cual" maxlength="50"></td>
            <td><label for="causa_cond">Causa</label></td>
            <td><textarea name="causa_cond" id="causa_cond" cols="30" rows="5"></textarea></td>
        </tr>
        <tr>
            <td><label>Control esfínteres</label></td>
            <td>
                <input type="radio" name="control" id="yes_ctrl" value="Si">
                <label for="yes_ctrl">Si</label>
                <input type="radio" name="control" id="no_ctrl" value="No">
                <label for="no_ctrl">No</label>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4" class="title">
                <h3 align="center">Salud del Alumno</h3>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label>¿Cuales vacunas ha recibido el alumno?</label>
            </td>
            <td colspan="2">
                <label>Enfermedades que ha padecido</label>
            </td>
        </tr>
            <td colspan="2">
                <input type="checkbox" name="vac[]" id="hepa" value="Hepatitis A">
                <label for="hepa">Hepatitis A</label><br>
                <input type="checkbox" name="vac[]" id="hepb" value="Hepatitis B">
                <label for="hepb">Hepatitis B</label><br>
                <input type="checkbox" name="vac[]" id="sar" value="Sarampión">
                <label for="sar">Sarampión</label><br>
                <input type="checkbox" name="vac[]" id="rub" value="Rubéola">
                <label for="rub">Rubéola</label><br>
                <input type="checkbox" name="vac[]" id="inf" value="Influenza">
                <label for="inf">Influenza</label><br>
                <input type="checkbox" name="vac[]" id="fie" value="Fiebre Amarilla">
                <label for="fie">Fiebre Amarilla</label>
            </td>
            <td colspan="2">
                <input type="checkbox" name="enf_alu[]" id="rbo" value="Rubéola">
                <label for="rbo">Rubéola</label><br>
                <input type="checkbox" name="enf_alu[]" id="mng" value="Meningitis">
                <label for="mng">Meningitis</label><br>
                <input type="checkbox" name="enf_alu[]" id="prd" value="Parotiditis">
                <label for="prd">Parotiditis</label><br>
                <input type="checkbox" name="enf_alu[]" id="lch" value="Lechina">
                <label for="lch">Lechina</label><br>
                <input type="checkbox" name="enf_alu[]" id="ppr" value="Paperas">
                <label for="ppr">Paperas</label>
            </td>
        <tr>
        <tr>
            <td><label for="gs_alu">Grupo Sanguineo</label></td>
            <td>
                <select name="gs_alu" id="gs_alu">
                    <option value="">-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="A-">A-</option>
                    <option value="A+">A+</option>
                    <option value="B-">B-</option>
                    <option value="B+">B+</option>
                    <option value="AB-">AB-</option>
                    <option value="AB+">AB+</option>
                </select>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <label>¿Ha sido hospitalizado alguna vez?</label>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <input type="radio" name="hosp" id="yes_hosp" value="Si">
                <label for="yes_hosp">Si</label>
                <input type="radio" name="hosp" id="no_hosp" value="No">
                <label for="no_hosp">No</label>
            </td>
            <td><label for="hcs">Causa</label></td>
            <td>
                <textarea name="hcs" id="hcs" cols="30" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align:center;">
                <label>¿Es alérgico?</label>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <input type="radio" name="alg" id="yes_alg" value="Si">
                <label for="yes_alg">Si</label>
                <input type="radio" name="alg" id="no_alg" value="No">
                <label for="no_alg">No</label>
            </td>
            <td><label for="acs">Causa</label></td>
            <td>
                <textarea name="acs" id="acs" cols="30" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td><input type="hidden" name="add"></td>
            <td><input type="hidden" name="admin" value="<?php echo $admin; ?>"></td>
            <td><a href="index.php" class="transparente reportes"><span>Lista</span></a></td>
            <td>
                <a href="../" class="transparente cancelar"><span>Cancelar</span></a>
                <button class="transparente aceptar"><span>Guardar</span></button>
            </td>
        </tr>
    </table>
</form>
<div class="options">
    <a href="" class="imprimir" target="_blank"><span>Imprimir reporte de inscripción</span></a>
</div>
<?php require '../../templates/admin/footer.php'; ?>