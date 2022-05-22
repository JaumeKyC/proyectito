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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logoico.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="../css/general-style.css">
    <script src="../js/scriptPedidos.js"></script>
    <title>Helios Corp.</title>
</head>

<body class="">
    <!-- HEADER -->
    <?php include('headerPages.php')?>
    <!-- FIN DEL HEADER -->

    <main>
        <!-- Block para dar espacio con el header, uno vacío primero para que haya un espacio con el segundo -->
        <div class="columns espaciadoSearcher">
            <div class="column is-8"></div>
            <div class="column is-2">
                <form method="post" action="#">
                    <div class=" field">
                        <div class="control ">
                            <input class="input is-link  is-small " name="filter" type="text" placeholder="Filtrar por cliente">
                        </div>
                    </div>
            </div>
            <div class="column is-1">
                <div class="control ">
                    <button href="#" type="submit" method="POST" class="button is-link is-outlined is-small">Aceptar</button>
                </div>
            </div>
            </form>
            <div class="column is-1"></div>
        </div>
        <!-- PRIMER BLOQUE PARA 3 BOTONES PRINCIPALES -->
        <div class="block">
            <!-- Dividimos en columnas -->
            <div class="columns is-mobile">
                <!-- Columnas vacías para dar margen a la izquierda -->
                <div class="column is-1"></div>
                <!-- Columnas que será donde vaya el contenido de la página en cuestión -->
                <div class="column is-10 ">
                    <!-- AQUÍ EMPIEZA EL CONTENIDO DE LA PÁGINA -->

                    <!-- DENTRO DEL SIGUIENTE DIV.BLOCK VA EL CONTENIDO DE LA PÁGINA-->
                    <div class="block">
                        <!-- ¡¡¡¡CONTENIDO AQUÍ!!!! -->
                        <div class="table-container">
                            <table class="datatable table is-hoverable is-centered table is-fullwidth">
                                <!-- class="table is-striped is-narrow is-hoverable has-text-centered is-centered" -->
                                <thead>
                                    <tr>
                                        <th class="">ID Pedido</th>
                                        <th class="">ID Cliente</th>
                                        <th class="">Fecha Pedido</th>
                                        <th class="">Fecha Esperada</th>
                                        <th class="">Fecha Entrega</th>
                                        <th class="">Estado</th>
                                        <th class="">Importe</th>
                                        <th class="" colspan="3">Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                    <?php
                                    echo $helios->drawPedidosList($_SESSION["isAdmin"]);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- FIN DEL CONTENIDO DE LA PÁGINA -->
                    <div class="block" id="detallitos">
                        <!-- Dividimos en columnas -->
                        <div id="pop-up">
                            <div class="columns">
                                <div class="column is-12 ">
                                    <!-- AQUÍ EMPIEZA EL CONTENIDO DE LA PÁGINA -->
                                    <!-- DENTRO DEL SIGUIENTE DIV.BLOCK VA EL CONTENIDO DE LA PÁGINA-->
                                    <!-- ¡¡¡¡CONTENIDO AQUÍ!!!! -->
                                    <!-- FORMULARIO -->
                                    <div class="">
                                        <table id="infoPedido" class=" table has-text-centered is-bordered is-stripped is-narrow">
                                            <!-- Aquí JS creará la tabla de info -->
                                        </table>
                                    </div>
                                    <div class="block"></div>
                                    <div class="columns">
                                        <div class="control column is-9"></div>
                                        <div class="control column is-2">
                                            <button id="cancelar-pop-up-info" type="button" class="button is-link is-light ">Salir</button>
                                        </div>
                                        <div class="control column is-1"></div>
                                    </div>
                                    <!-- FIN DEL CONTENIDO DE LA PÁGINA -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block" id="borraditos">
                        <!-- Dividimos en columnas -->
                        <div id="pop-up">
                            <div class="columns">
                                <!-- Columnas vacías para dar margen a la izquierda -->
                                <!-- Columnas que será donde vaya el contenido de la página en cuestión -->
                                <div class="column is-12 ">
                                    <!-- AQUÍ EMPIEZA EL CONTENIDO DE LA PÁGINA -->
                                    <!-- DENTRO DEL SIGUIENTE DIV.BLOCK VA EL CONTENIDO DE LA PÁGINA-->
                                    <!-- ¡¡¡¡CONTENIDO AQUÍ!!!! -->
                                    <!-- FORMULARIO -->
                                    <form action="" id="deletePedidos" method="POST">
                                        <div class="block">Estás a punto de borrar el pedido.</div>
                                        <div class="columns">
                                            <div class="column is-1"></div>
                                            <div class="column is-10">

                                                <div class="field is-grouped">
                                                    <div class="control">
                                                        <button type="submit" method="POST" class="button is-link">Aceptar</button>
                                                    </div>
                                                    <div class="control">
                                                        <button id="cancelar-pop-up-delete" type="button" class="button is-link is-light">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="column is-1"></div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- Columnas vacías para dar margen a la derecha -->
                        </div>
                    </div>
                </div>
                <!-- Columnas vacías para dar margen a la derecha -->
                <div class="column is-1"></div>
            </div>
        </div>
        <!-- FIN DEL CONTENIDO DE LA PÁGINA -->
        <!-- Otro bloque para dar espacio con el Footer -->
        <div class="block"></div>
    </main>
    <!-- FIN DE LA MAIN SECTION -->
    <!-- FOOTER -->
    <footer class="footer2">
        <div class="container logo-nav-container">
            <a href="../indexAlmacen.php">
                <span class="icon is-large">
                    <img src="../img/flecha-hacia-atras.png" alt="">
                </span>
            </a>
            <span>
                <a href="./crearPedido.php"><input class="button is-link is-right" type="button" value="Nuevo"></a>
            </span>
    </footer>
    <!-- FIN DEL FOOTER -->
</body>

</html>