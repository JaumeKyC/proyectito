<?php
require_once "autoload.php";
$helios = new HeliosCorp();
if (count($_POST) > 0) $helios->newClient($_POST);
header("Location: clientes.php");

