<?php

if(isset($_GET['id']))
{
    $id = htmlspecialchars($_GET['id']);
    $admin = htmlspecialchars($_GET['admin']);
    $user = htmlspecialchars($_GET['user']);
    if(!preg_match("/^[0-9]+$/", $id))
    {
        header("location:javascript:history.go(-1)");
    }
    else
    {
        //Agregamos evento en auditoria
        $accion = "Eliminación de Usuario";
        $referencia = $user;
        date_default_timezone_set("America/Caracas");
        $fehr = date("Y-m-d H:i:s");
        $model = new Crud;
        $model->into = "auditoria";
        $model->columns = "admin, accion, referencia, fehr";
        $model->values = "'$admin', '$accion', '$referencia', '$fehr'";
        $model->Create();
        //Eliminamos el registro
        $model = new Crud();
        $model->deleteFrom = "usuarios";
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
