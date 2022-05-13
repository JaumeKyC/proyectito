<?php require_once 'autoloader.php';
$helios = new HeliosCorp();

if (count($_GET) > 0) {
    $helios->deleteClientes($_GET["id"]);
}

header('Location: clientes.php');
