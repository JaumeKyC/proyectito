<?php

require_once "autoloader.php";
$helios = new HeliosCorp();
if (count($_POST) > 0){
    /* var_dump($_POST); */
 $helios->createPedido($_POST);
}
header("Location: newPedido.php?idcliente=".$_POST["ID_Cliente"]."&idpedido=". $_POST["ID_Pedido"]."");