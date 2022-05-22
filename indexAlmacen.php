<?php 
session_start();
if(!isset($_SESSION["user"])){header("Location: ./index.php?error=Insert User and Password");}

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
    <title>Helios Corp.</title>
</head>

<body class="">
    <!-- HEADER -->
    <?php include('header.php')?>
    <!-- FIN DEL HEADER -->

    <!-- MAIN SECTION -->
    <main>
        <!-- Block para dar espacio con el header, uno vacío primero para que haya un espacio con el segundo -->
        <div class="block"></div>
        <!-- PRIMER BLOQUE PARA 3 BOTONES PRINCIPALES -->
       <!--  <div class="block "> -->
            <!-- Dividimos en columnas -->
            <div class=" margen1 columns is-mobile">
                <!-- Columnas vacías para dar margen a la izquierda -->
                <div class="column is-1"></div>
                <!-- Columnas que será donde vaya el contenido de la página en cuestión -->
                <div class="column is-10 ">
                    <div class="columns">
                        
                        <div class="column is-4 has-text-centered titulo-imagen">
                            <a href="./pages/clientes.php"> <img class="img-button" src="img/menu/clientes2.jpg" alt="">
                                <div class="titulo-centrado ">Clientes</div>
                            </a>
                        </div>
                        <div class="column is-4 has-text-centered titulo-imagen">
                            <a href="./pages/pedidos.php"> <img class="img-button" src="img/menu/pedidos2.jpg" alt="">
                                <div class="titulo-centrado">Pedidos</div>
                            </a>
                        </div>
                        <div class="column is-4 has-text-centered titulo-imagen">
                            <a href="./pages/productos.php"> <img class="img-button" src="img/menu/productos2.jpg" alt="">
                                <div class="titulo-centrado">Productos</div>
                            </a>
                        </div>
                       
                    </div>
                </div>
                <!-- Columnas vacías para dar margen a la derecha -->
                <div class="column is-1"></div>
            </div>
        <!-- </div> -->
        <!-- Otro bloque para dar espacio con el Footer -->
    </main>
    <!-- FIN DE LA MAIN SECTION -->

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container logo-nav-container">
            <a href="indexMenu.php">
               <!--  <div class="icon-text navbar-item"> -->
                    <span class="icon is-large">
                        <img src="img/flecha-hacia-atras.png" alt="" class="flechaAtras">
                    </span>
                <!-- </div> -->
            </a>
        </div>
    </footer>
    <!-- FIN DEL FOOTER -->
</body>

</html>