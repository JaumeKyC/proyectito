<?php
require_once "autoloader.php";
$helios = new HeliosCorp();
echo json_encode($helios->getProducto($_GET["id"]));
