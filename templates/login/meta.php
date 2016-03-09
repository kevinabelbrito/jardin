<?php
session_start();
if (isset($_SESSION['admin']))
{
	header("location:".$dominio."admin");
}
else
{
	session_unset();
	session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">