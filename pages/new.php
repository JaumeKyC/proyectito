<?php
//Diego
session_start();
if(!isset($_SESSION["user"])){header("Location: ../index.php?error=Insert User and Password");}
require_once "autoloader.php";
$helios = new HeliosCorp();
if (count($_POST) > 0){

 $helios->newClient($_POST);
}
header("Location: clientes.php");