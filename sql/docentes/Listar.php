<?php
$pagination = new PDO_Pagination($connection);
$pagination->btn_back_page = "Anterior";
$pagination->btn_first_page = "Primera";
$pagination->btn_last_page = "Ultima";
$pagination->btn_next_page = "Siguiente";
$pagination->btn_page = "Pag.";


if(isset($_REQUEST["search"]) && $_REQUEST['search']!="" && isset($_REQUEST["nac"]) && $_REQUEST['nac']!="")
{
$search = htmlspecialchars($_REQUEST["search"]);
$nac = htmlspecialchars($_REQUEST["nac"]);
$pagination->param = "&nac=$nac&search=$search";
$pagination->rowCount("SELECT * FROM docentes WHERE nac='$nac' AND cedula='$search'");
$pagination->config(3, 20);
$sql = "SELECT * FROM docentes WHERE nac='$nac' AND cedula='$search' ORDER BY nombres ASC LIMIT $pagination->start_row, $pagination->max_rows";
	$query = $connection->prepare($sql);
    $query->execute();
    $model = array();
    $total = 0;
    $mensaje = "No se encontró ningún docente con la cedula: $nac-$search";
    while($rows = $query->fetch())
    {
        $model[] = $rows;
        $total++;
    }
}
else
{
$search = null;
$nac = null;
$pagination->rowCount("SELECT * FROM docentes");
$pagination->config(3, 20);
$sql = "SELECT * FROM docentes ORDER BY nombres ASC LIMIT $pagination->start_row, $pagination->max_rows";
$query = $connection->prepare($sql);
$query->execute();
$model = array();
$total = 0;
$mensaje = "No hay docentes registrados en la Base de Datos";
while($rows = $query->fetch())
{
    $model[] = $rows;
    $total++;
}
}
?>