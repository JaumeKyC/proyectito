<?php
//Lenin
session_start();
if(!isset($_SESSION["user"])){header("Location: ../index.php?error=Insert User and Password");}
require_once "autoloader.php";
$helios = new HeliosCorp();
echo json_encode($helios->getDetailPedido($_GET["id"]));