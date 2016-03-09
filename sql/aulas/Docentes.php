<?php

$model = new Crud;
$model->select = "*";
$model->from = "docentes";
$model->Read();
$docentes = $model->rows;

?>