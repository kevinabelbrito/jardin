<?php

if(isset($_GET['id']))
{
    $id = htmlspecialchars($_GET['id']);
    $nac = htmlspecialchars($_GET['nac']);
    $search = htmlspecialchars($_GET['search']);
    $admin = htmlspecialchars($_GET['admin']);
    if(!preg_match("/^[0-9]+$/", $id))
    {
        header("location:javascript:history.go(-1)");
    }
    else
    {
        $accion = "Eliminación de Docente";
        $referencia = nmb_dct($id)." ".ape_dct($id);
        date_default_timezone_set("America/Caracas");
        $fehr = date("Y-m-d H:i:s");
        $model = new Crud;
        $model->into = "auditoria";
        $model->columns = "admin, accion, referencia, fehr";
        $model->values = "'$admin', '$accion', '$referencia', '$fehr'";
        $model->Create();
        //Eliminamos el registro
        $model = new Crud();
        $model->deleteFrom = "docentes";
        $model->condition = "id=$id";
        $model->Delete();
        header("location:index.php?nac=$nac&search=$search");
    }
}
 else
{
    header("location:javascript:history.go(-1)");
}
?>
