<?php
//Lenin
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../index.php?error=Insert User and Password");
}
require_once "autoloader.php";
$helios = new HeliosCorp();
if (count($_POST) > 0){
 $helios->getInsertDetalle($_POST);
}
header("Location: newPedido.php?idcliente=".$_POST["idcliente"]."&idpedido=". $_POST["idpedido"]."");