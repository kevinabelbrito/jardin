<?php

if(isset($_GET['id']))
{
    $id = htmlspecialchars($_GET['id']);
    $admin = htmlspecialchars($_GET['admin']);
    $user = htmlspecialchars($_GET['user']);
    $estado = htmlspecialchars($_GET['estado']);
    if(!preg_match("/^[0-9]+$/", $id))
    {
        header("location:javascript:history.go(-1)");
    }
    else
    {
        //Actualizando el estado del usuario
        $model = new Crud();
        $model->update = "usuarios";
        $model->set = "estado='$estado'";
        $model->condition = "id=$id";
        $model->Update();
        //Agregamos evento en auditoria
        $accion = "Estado de Usuario";
        $referencia = "$user fue $estado del sistema";
        date_default_timezone_set("America/Caracas");
        $fehr = date("Y-m-d H:i:s");
        $model = new Crud;
        $model->into = "auditoria";
        $model->columns = "admin, accion, referencia, fehr";
        $model->values = "'$admin', '$accion', '$referencia', '$fehr'";
        $model->Create();
        header("location:index.php");
    }
}
 else
{
    header("location:javascript:history.go(-1)");
}
?>
