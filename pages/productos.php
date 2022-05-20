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
    <script src="../js/scriptProductos.js"></script>
    <title>Helios Corp.</title>
</head>

<body class="">
    <!-- HEADER -->
    <header class="">
        <div class="container logo-nav-container">
            <a href="../indexMenu.php">
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
                        <a href="logout.php">
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
        <div class="columns espaciadoSearcher">
            <div class="column is-8"></div>
            <div class="column is-2">
                <form method="post" action="#">
                    <div class=" field">
                        <div class="control ">
                            <input class="input is-link  is-small " name="filter" type="text" placeholder="Filtrar por producto">
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
                                        <th class="">ID Producto</th>
                                        <th class="">Nombre</th>
                                        <th class="">Proveedor</th>
                                        <!-- <th class="">Descripción</th> -->
                                        <th class="">CantidadStock</th>
                                        <th class="">PrecioVenta</th>
                                        <th class="">PrecioProveedor</th>
                                        <th class="" colspan="3">Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                    <?php
                                    echo $helios->drawProductosList($_SESSION["isAdmin"]);
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- FIN DEL CONTENIDO DE LA PÁGINA -->

                </div>

                <!-- Columnas vacías para dar margen a la derecha -->
                <div class="column is-1"></div>
            </div>
        </div>

        <!-- FIN DEL CONTENIDO DE LA PÁGINA -->
        <div class="columns" id="productitos">
            <div class="column is-1"></div>
            <!-- Dividimos en columnas -->
            <div class="is-10" id="pop-up">
                <!-- ¡¡¡¡CONTENIDO AQUÍ!!!! -->
                <!-- FORMULARIO -->
                <form action="newProducto.php" id="insertForm" method="POST">
                    <div class="columns">

                        <div class="column is-6">
                            <label class="label">ID Producto</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Text input" required name="idProducto" value="">
                            </div>

                            <label class="label">Nombre</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Text input" required name="nombre">
                            </div>

                            <label class="label">Proveedor</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Text input" required name="proveedor">
                            </div>

                            <label class="label">CantidadStock</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Text input" required name="cantidadStock">
                            </div>
                        </div>
                        <div class="column is-6">
                            <label class="label">PrecioVenta</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Text input" required name="precioVenta">
                            </div>

                            <label class="label">PrecioProveedor</label>
                            <div class="control">
                                <input class="input" type="text" placeholder="Text input" required name="precioProveedor">
                            </div>
                            <label class="label">Descripcion</label>
                            <div class="control ">
                                <textarea class="textarea" type="text" placeholder="Description" required name="descripcion"></textarea>
                            </div>
                            <div class="block"></div>
                            <div class="field is-grouped">
                                <div class="control">
                                    <button type="submit" method="POST" class="button is-link">Aceptar</button>
                                </div>
                                <div class="control">
                                    <button id="cancelar-pop-up" type="button" class="button is-link is-light">Cancelar</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="column is-1"></div>
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
                        <div class="">
                            <!-- ¡¡¡¡CONTENIDO AQUÍ!!!! -->
                            <!-- FORMULARIO -->
                            <form action="newProducto.php" id="insertForm" method="POST">
                                <div class="columns">
                                    <div class="column is-1"></div>

                                    <div class="column is-5">

                                        <label class="label">ID Producto</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="id" value="<?= $helios->maxIDCliente() ?>" readonly>
                                        </div>

                                        <label class="label">Nombre</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="nombre">
                                        </div>

                                        <label class="label"></label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="nombreContacto">
                                        </div>

                                        <label class="label">Proveedor</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="apellidoContacto">
                                        </div>

                                        <label class="label">Descripcion</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="telefono">
                                        </div>

                                        <label class="label">Cantidad Stock</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="direccionCalle">
                                        </div>
                                    </div>
                                    <div class="column is-5">
                                        <label class="label">Precio de Venta</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="direccionNumero">
                                        </div>

                                        <label class="label">Precio de Proveedor</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="ciudad">
                                        </div>
                                        <div class="field is-grouped">
                                            <div class="control">
                                                <button type="submit" method="POST" class="button is-link">Aceptar</button>
                                            </div>
                                            <div class="control">
                                                <button id="cancelar-pop-up" type="button" class="button is-link is-light">Cancelar</button>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="column is-1 "></div>
                                </div>
                            </form>
                            <!-- FIN DEL CONTENIDO DE LA PÁGINA -->
                        </div>
                    </div>

                    <!-- Columnas vacías para dar margen a la derecha -->

                </div>
            </div>
        </div>

        <div class="block" id="detallitos">
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
                        <div class="">
                            <table id="infoProducto" class=" table has-text-centered is-bordered is-stripped is-narrow">
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

                    <!-- Columnas vacías para dar margen a la derecha -->

                </div>
            </div>
        </div>

        <!-- Otro bloque para dar espacio con el Footer -->
        <div class="block"></div>
    </main>
    <!-- FIN DE LA MAIN SECTION -->

    <!-- FOOTER -->
    <footer class="footer2">


        <div class="container logo-nav-container">
            <a href="../indexAlmacen.php">
                <!-- <div class="icon-text navbar-item"> -->
                <span class="icon is-large">
                    <img src="../img/flecha-hacia-atras.png" alt="">
                </span>

                <!--  </div> -->
            </a>
            <span>
                <input id="pop-up-producto" class="button is-link is-right" type="button" value="Nuevo"></a>
            </span>

    </footer>
    <!-- FIN DEL FOOTER -->
</body>

</html>