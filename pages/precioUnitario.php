<?php
require_once "autoloader.php";
$helios = new HeliosCorp();
if (count($_POST) > 0){
     
 $helios->getImporteUnitario($_POST);
 
 
}
header("Location: newPedido.php?idcliente=".$_POST["idcliente"]."&idpedido=". $_POST["idpedido"]."");