<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../index.php?error=Insert User and Password");
}
require_once 'autoloader.php';
$helios = new HeliosCorp();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" href="../img/logoico.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="../css/general-style.css">
    <title>Helios Corp.</title>
</head>

<body class="">

    <?php include('headerPages.php') ?>
    <main>
        <div class="block"></div>
        <div class="block">
            <div class="columns">
                <div class="column is-2"></div>
                <div class="column is-8">
                    <form action="insertdetalleP.php" method="POST">
                        <div class="columns card">
                            <div class="column is-5">
                                <div class="columns">
                                    <div class="column is-9 ">
                                        <label class="label">ID</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="idpedido" value="<?= $_GET["idpedido"] ?>" readonly>
                                        </div>
                                        <label class="label">Cliente</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="idcliente" value="<?= $_GET["idcliente"] ?>" readonly>
                                        </div>
                                        <div class="block"></div>
                                        <label class="label">Producto</label>
                                        <div class="control">
                                            <div class="select">
                                                <select required name="producto">
                                                    <?= $helios->drawProductosOptions() ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="block"></div>
                                        <label class="label">Cantidad</label>
                                        <div class="control">
                                            <input class="input" type="number" placeholder="Text input" required name="cantidad" value="">
                                        </div>
                                        <div class="block"></div>
                                        <div class="field is-grouped">
                                            <div class="control">
                                                <button href="#" type="submit" method="POST" class="button is-link is-light">Agregar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-3"></div>
                                </div>
                            </div>
                            <div class="column is-7 card ">
                                <div class="content is-justify-content-end">
                                    <?= $helios->getPedidosProducto($_GET["idpedido"]) ?>
                                </div>
                                <div class="content is-justify-content-end is-pulled-left">
                                    <?= $helios->getImporteTotal($_GET["idpedido"]) ?>
                                </div>
                                <div class="controlis-pulled-right">
                                    <a href="./pedidos.php" type="button" class="button is-link is-medium is-pulled-right">ACEPTAR</a>
                                </div>
                            </div>
                            <div class="column is-1"></div>
                        </div>
                        <div class="column is-1"></div>
                    </form>
                </div>
                <div class="column is-2"></div>
            </div>
        </div>
        </div>
    </main>
    <footer class="footer2">
        <div class="container logo-nav-container">
            <a href="./crearPedido.php">
                <span class="icon is-large">
                    <img class="flechaAtras" src="../img/flecha-hacia-atras.png" alt="">
                </span>
            </a>
        </div>
    </footer>
</body>
<?php
if (count($_POST) > 0) {
    var_dump($_POST);
}
?>

</html>