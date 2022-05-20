<?php
require_once "autoloader.php";
$helios = new HeliosCorp();
if (count($_POST) > 0){
/*    var_dump($_POST);
    die(); */ 
 $helios->newProducto($_POST);
}
header("Location: productos.php");

