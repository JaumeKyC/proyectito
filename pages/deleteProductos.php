<?php 
//Alejandro
session_start();
if(!isset($_SESSION["user"])){header("Location: ../index.php?error=Insert User and Password");}
require_once 'autoloader.php';
$helios = new HeliosCorp();
if (count($_GET) > 0) {
 $helios->deleteProductos($_GET["id"]);
}
header('Location: productos.php');
