<?php
$pagination = new PDO_Pagination($connection);
$pagination->btn_back_page = "Anterior";
$pagination->btn_first_page = "Primera";
$pagination->btn_last_page = "Ultima";
$pagination->btn_next_page = "Siguiente";
$pagination->btn_page = "Pag.";


if(isset($_REQUEST["search"]) && $_REQUEST["search"] != "")
{
$search = htmlspecialchars($_REQUEST["search"]);
$pagination->param = "&search=$search";
$pagination->rowCount("SELECT * FROM alumnos WHERE cedula LIKE '%$search%'");
$pagination->config(3, 20);
$sql = "SELECT * FROM alumnos WHERE cedula LIKE '%$search%' ORDER BY aula ASC, nombres ASC LIMIT $pagination->start_row, $pagination->max_rows";
	$query = $connection->prepare($sql);
    $query->execute();
    $model = array();
    $total = 0;
    $mensaje = "La busqueda <strong>$search</strong> no arrojo resultados";
    while($rows = $query->fetch())
    {
        $model[] = $rows;
        $total++;
    }
}
else
{
$search = null;
$pagination->rowCount("SELECT * FROM alumnos");
$pagination->config(3, 20);
$sql = "SELECT * FROM alumnos ORDER BY aula ASC, nombres ASC LIMIT $pagination->start_row, $pagination->max_rows";
$query = $connection->prepare($sql);
$query->execute();
$model = array();
$total = 0;
$mensaje = "No hay alumnos inscriptos que esten registrados en la Base de Datos";
while($rows = $query->fetch())
{
    $model[] = $rows;
    $total++;
}
}
?>