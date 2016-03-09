<?php

require '../../sql/Funciones.php';

$fenac = htmlspecialchars($_POST['fenac']);
$edad = CalculaEdad($fenac);
echo $edad;

?>