<?php

if(isset($_GET['id']))
{
    $id = htmlspecialchars($_GET['id']);
    $admin = htmlspecialchars($_GET['admin']);
    if(!preg_match("/^[0-9]+$/", $id))
    {
        header("location:javascript:history.go(-1)");
    }
    else
    {
        //Agregamos evento en auditoria
        $accion = "Eliminación de Aula";
        $referencia = "Sección:".seccion($id)." | Grupo:".grupo($id)." | Turno:".turno($id)." | Periodo:".desde($id)."-".hasta($id);
        date_default_timezone_set("America/Caracas");
        $fehr = date("Y-m-d H:i:s");
        $model = new Crud;
        $model->into = "auditoria";
        $model->columns = "admin, accion, referencia, fehr";
        $model->values = "'$admin', '$accion', '$referencia', '$fehr'";
        $model->Create();
        //Eliminamos el registro
        $model = new Crud();
        $model->deleteFrom = "aulas";
        $model->condition = "id=$id";
        $model->Delete();
        header("location:index.php");
    }
}
 else
{
    header("location:javascript:history.go(-1)");
}
?>
