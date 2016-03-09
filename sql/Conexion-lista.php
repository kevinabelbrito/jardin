<?php
/* Config Connection */
$user = 'root';
$password = 'kevin';
$host = 'localhost';
$dbname = 'jardin';

$connection = new PDO("mysql:host=$host;dbname=$dbname;", $user, $password);
?>