<?php
require_once "autoloader.php";
$cliente = new HeliosCorp();
$cliente->getAllClientes();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logoico.ico">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="css/general-style.css">
    <script src="./js/script.js"></script>
    <title>Filtrar</title>
</head>
<body>
    <form action="pages/clientes.php" method="POST">
        Busca la empresa &nbsp <input type="text" name="cliente" value="<?= $cliente->getFilter() ?>">
        &nbsp<input type="submit" value="Search"><br><br>
    </form>
</body>
</html>
