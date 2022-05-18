<?php
require_once "autoloader.php";
$helios = new HeliosCorp();

echo json_encode($helios->getCliente($_GET["id"]));