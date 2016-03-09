<?php
session_start();
if ($_SESSION['admin'] == true)
{
	$id_admin = $_SESSION['id'];
	$admin = $_SESSION['user'];
	$tipo_admin = $_SESSION['tipo'];
}
else
{
	session_unset();
	session_destroy();
	header("location:$dominio");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">