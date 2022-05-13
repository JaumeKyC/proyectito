<?php   /* require_once 'consultaClientes.php'; */
require_once 'autoloader.php';
$helios = new HeliosCorp();
/* var_dump($helios->getAllClientes()); */
/* if ($_GET["success"] = true) {
    $helios->alert("Cliente borrado con éxito");
} */
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
    <script src="../js/script.js"></script>
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
                                <span>Usuario</span>
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
                                        <th class="">ID</th>
                                        <th class="">Empresa</th>
                                        <th class="">Nom. de Contacto</th>
                                        <th class="">Ape. del Contacto</th>
                                        <th class="">Email</th>
                                        <th class="">Teléfono</th>
                                        <th class="">Calle</th>
                                        <th class="">Num.</th>
                                        <th class="">Ciudad</th>
                                        <th class="">Comunidad</th>
                                        <th class="">País</th>
                                        <th class="">Cod. Postal</th>
                                        <th class="" colspan="2">Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                    <?php
                                    echo $helios->drawClientesList();
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


        <!-- Otro bloque para dar espacio con el Footer -->
        <div class="block"></div>
    </main>
    <!-- FIN DE LA MAIN SECTION -->

    <!-- FOOTER -->
    <footer class="footer">


        <div class="container logo-nav-container">
            <a href="../indexAlmacen.php">
                <div class="icon-text navbar-item">
                    <span class="icon is-large">
                        <img src="../img/flecha-hacia-atras.png" alt="">
                    </span>

                </div>
            </a>
            <span>
                <a href="./nuevoCliente.php"><input class="button is-link is-right" type="button" value="Nuevo"></a>
                <a href="#"><input class="button is-light" type="submit" value="Filtrar"></a>
            </span>

    </footer>
    <!-- FIN DEL FOOTER -->
</body>

</html>