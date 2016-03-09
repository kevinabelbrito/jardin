<?php
require '../../templates/dominio.php';
require '../../sql/Conexion.php';
require '../../sql/Crud.php';
session_start();
//Agregamos evento en auditoria
$admin = $_SESSION['user'];
$accion = "Salió del Sistema";
$referencia = $_SESSION['tipo'];
date_default_timezone_set("America/Caracas");
$fehr = date("Y-m-d H:i:s");
$model = new Crud;
$model->into = "auditoria";
$model->columns = "admin, accion, referencia, fehr";
$model->values = "'$admin', '$accion', '$referencia', '$fehr'";
$model->Create();
session_destroy();
header("location:$dominio");
?>