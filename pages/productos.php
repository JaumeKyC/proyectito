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
    <?php include('headerPages.php') ?>
    <main>
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
        <div class="block">
            <div class="columns is-mobile">
                <div class="column is-1"></div>
                <div class="column is-10 ">
                    <div class="block">
                        <div class="table-container">
                            <table class="datatable table is-hoverable is-centered table is-fullwidth">
                                <thead>
                                    <tr>
                                        <th class="">ID Producto</th>
                                        <th class="">Nombre</th>
                                        <th class="">Proveedor</th>

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
                </div>
                <div class="column is-1"></div>
            </div>
        </div>

        <div class="columns" id="productitos">
            <div class="column is-1"></div>

            <div class="is-10" id="pop-up">

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
            <div id="pop-up">
                <div class="columns">
                    <div class="column is-12 ">
                        <form action="" id="deleteProducto" method="POST">
                            <div class="block">Estás a punto de borrar el cliente.</div>
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
            </div>
        </div>
        <div class="block" id="detallitos">
            <div id="pop-up">
                <div class="columns">
                    <div class="column is-12 ">
                        <div class="">
                            <table id="infoProducto" class=" table has-text-centered is-bordered is-stripped is-narrow">
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
                    </div>
                </div>
            </div>
        </div>

        <div class="columns" id="editaditos">
            <div class="column is-1"></div>

            <div class="is-10" id="pop-up">

                <form action="editProducto.php" id="insertForm" method="POST">
                    <div class="columns">

                        <div class="column is-6">
                            <label class="label">ID Producto</label>
                            <div class="control">
                                <input class="input input2" type="text" placeholder="Text input" required name="idProducto" value="">
                            </div>

                            <label class="label">Nombre</label>
                            <div class="control">
                                <input class="input input2" type="text" placeholder="Text input" required name="nombre">
                            </div>

                            <label class="label">Proveedor</label>
                            <div class="control">
                                <input class="input input2" type="text" placeholder="Text input" required name="proveedor">
                            </div>
                            <label class="label">Descripcion</label>
                            <div class="control ">
                                <textarea class=" is-small textarea input2" type="text" placeholder="Description" required name="descripcion"></textarea>
                            </div>


                        </div>
                        <div class="column is-6">
                            <label class="label">CantidadStock</label>
                            <div class="control">
                                <input class="input input2" type="text" placeholder="Text input" required name="cantidadStock">
                            </div>
                            <label class="label">PrecioVenta</label>
                            <div class="control">
                                <input class="input input2" type="text" placeholder="Text input" required name="precioVenta">
                            </div>

                            <label class="label">PrecioProveedor</label>
                            <div class="control">
                                <input class="input input2" type="text" placeholder="Text input" required name="precioProveedor">
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
        <div class="block"></div>
    </main>
    <footer class="footer2">
        <div class="container logo-nav-container">
            <a href="../indexAlmacen.php">
                <span class="icon is-large">
                    <img src="../img/flecha-hacia-atras.png" alt="">
                </span>
            </a>
            <span>
                <input id="pop-up-producto" class="button is-link is-right" type="button" value="Nuevo"></a>
            </span>
    </footer>
</body>

</html>