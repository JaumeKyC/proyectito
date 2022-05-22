<?php 
session_start();
if(!isset($_SESSION["user"])){header("Location: ../index.php?error=Insert User and Password");}
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
    <script src="../js/script.js"></script>
    <title>Helios Corp.</title>
</head>

<body class="">
    <!-- HEADER -->
    <?php include('headerPages.php')?>
    <!-- FIN DEL HEADER -->

    <main>
        <!-- Block para dar espacio con el header, uno vacío primero para que haya un espacio con el segundo -->
        <div class="block"></div>
        <!-- PRIMER BLOQUE PARA 3 BOTONES PRINCIPALES -->
        <div class="block">
            <!-- Dividimos en columnas -->
            <div class="columns">
                <!-- Columnas vacías para dar margen a la izquierda -->
                <div class="column is-2"></div>
                <!-- Columnas que será donde vaya el contenido de la página en cuestión -->
                <div class="column is-8 ">
                    <!-- AQUÍ EMPIEZA EL CONTENIDO DE LA PÁGINA -->

                    <!-- DENTRO DEL SIGUIENTE DIV.BLOCK VA EL CONTENIDO DE LA PÁGINA-->
                    <div class="">
                        <!-- ¡¡¡¡CONTENIDO AQUÍ!!!! -->
                        <!-- FORMULARIO -->
                        <div class="table-container">
                            <table class=" table is-fullwidth has-text-centered is-hoverable is-bordered is-stripped">
                            <?= $helios->drawClienteInfo($_GET["id"]);?>
                            </table>
                        </div>
                        <!-- FIN DEL CONTENIDO DE LA PÁGINA -->
                    </div>
                </div>

                <!-- Columnas vacías para dar margen a la derecha -->
                <div class="column is-2"></div>
            </div>
        </div>
        <!-- FIN DE LA MAIN SECTION -->
    </main>
    <!-- FOOTER -->
    <footer class="">
        <div class="container logo-nav-container">
            <a href="./clientes.php">
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

?>

</html>