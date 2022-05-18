<?php
require_once "autoloader.php";
$helios = new HeliosCorp();
if (count($_POST) > 0){

 $helios->editClient($_POST);
}
header("Location: clientes.php");