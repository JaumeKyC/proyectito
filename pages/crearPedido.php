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
    <!-- HEADER -->
    <header class="">
        <div class="container logo-nav-container">
            <a href="../index.php">
                <!-- LOGO -->
                <img class="main_logo" src="../img/logo5.png" alt="main_logo">
            </a>
            <!-- BARRA DE NAVEGACIÓN -->
            <!-- Falta añadir los enlaces en el href -->
            <div class="navbar">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <a href="#">
                            <div class="icon-text navbar-item">
                                <span class="icon is-large">
                                    <img src="../img/usuario.png" alt="">
                                </span>
                                <span class="user"><?= ucfirst($_SESSION["user"]) ?></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-text navbar-item">
                                <span class="icon is-large">
                                    <img src="../img/mensajes.png" alt="">
                                </span>
                                <span>Mensajes</span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-text navbar-item">
                                <span class="icon is-large">
                                    <img src="../img/cerrar.png" alt="">
                                </span>
                                <span>Desconectar</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- FIN DEL HEADER -->

    <main>
        <!-- Block para dar espacio con el header, uno vacío primero para que haya un espacio con el segundo -->
        <div class="block"></div>
        <!-- PRIMER BLOQUE PARA 3 BOTONES PRINCIPALES -->

        <!-- Dividimos en columnas -->

        <div class="columns">
            <!-- Columnas vacías para dar margen a la izquierda -->
            <div class="column is-2"></div>
            <!-- Columnas que será donde vaya el contenido de la página en cuestión -->
            <div class="column is-8 ">
                <!-- ¡¡¡¡CONTENIDO AQUÍ!!!! -->
                <div class="columns has-text-centered">
                    <div class="column is-2"></div>
                    <div class="tile is-vertical is-8 tile box">
                        <form action="createPedido.php" method="POST">
                            <label class="label ">Selecciona un cliente:</label>
                            <div class="select is-grouped ">
                                <select required name="ID_Cliente" class="has-text-centered">
                                    <?= $helios->drawClientesOptions() ?>
                                </select>
                            </div>
                            <div class="block"></div>
                            <div class="control">
                            <label class="label ">ID del Pedido:</label> 
                                <input style="width:50%" class="input has-text-centered" type="text" placeholder="" required name="ID_Pedido" value="<?=$helios->maxIDPedido() ?>" readonly>
                            </div>
                            <div class="block"></div>
                            <button href="#" type="submit" method="POST" class="button is-link  ">Crear pedido</button>
                        </form>

                    </div>
                    <div class="column is-2"></div>
                </div>
            </div>
            <div class="column is-2"></div>
        </div>
        <!-- FIN DEL CONTENIDO DE LA PÁGINA -->
        <!-- Columnas vacías para dar margen a la derecha -->
        <!-- FIN DE LA MAIN SECTION -->
    </main>
    <!-- FOOTER -->
    <footer class="">
        <div class="container logo-nav-container">
            <a href="./pedidos.php">
                <div class="icon-text navbar-item">
                    <span class="icon is-large">
                        <img src="../img/flecha-hacia-atras.png" alt="">
                    </span>
                </div>
            </a>
        </div>
    </footer>
    <!-- FIN DEL FOOTER -->
</body>
<?php
if (count($_POST) > 0) {
    var_dump($_POST);
}
?>

</html>