<?php

$model = new Crud;
$model->select = "*";
$model->from = "aulas";
$model->Read();
$aulas = $model->rows;

?>