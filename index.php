<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo_icon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="css/general-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css%22%3E">
    <title>Helios Corp.</title>
</head>

<body class="">
    <!-- HEADER -->
    <header class="">
        <div class="container logo-nav-container">
            <a href="index.php">
                <!-- LOGO -->
                <img class="main_logo" src="img/logo5.png" alt="main_logo">
            </a>
            <!-- BARRA DE NAVEGACIÓN -->
            <!-- Falta añadir los enlaces en el href -->
            <div class="navbar">
                <div class="navbar-end">
                    <div class="navbar-item">
                        <a href="#">
                            <div class="icon-text navbar-item">
                                <span class="icon is-large">
                                    <img src="img/usuario.png" alt="">
                                </span>
                                <span>Usuario</span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-text navbar-item">
                                <span class="icon is-large">
                                    <img src="img/mensajes.png" alt="">
                                </span>
                                <span>Mensajes</span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="icon-text navbar-item">
                                <span class="icon is-large">
                                    <img src="img/cerrar.png" alt="">
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

    <!-- MAIN SECTION -->
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
                <div class="columns container">
                        <div class="column is-1.5"></div>
                        <div class="column is-3 has-text-centered card">
                            <a href="#"> <img src="img/clientes.png" alt=""></a>
                        </div>
                        <div class="column is-3 has-text-centered card">
                            <a href="#"> <img src="img/pedidos.png" alt=""></a>
                        </div>
                        <div class="column is-3 has-text-centered card">
                        <a href="#"> <img src="img/almacen.png" alt=""></a>
                        </div>
                        <div class="column is-1.5"></div>
                    </div>
                </div>
                <!-- Columnas vacías para dar margen a la derecha -->
                <div class="column is-2"></div>
            </div>

            <!-- SEGUNDO BLOQUE PARA OTROS 3 BOTONES PRINCIPALES -->

            <!-- Dividimos en columnas -->
            <div class="columns">
                <!-- Columnas vacías para dar margen a la izquierda -->
                <div class="column is-2"></div>
                <!-- Columnas que será donde vaya el contenido de la página en cuestión -->
                <div class="column is-8 ">
                    <div class="columns">
                        <div class="column is-1.5"></div>
                        <div class="column is-3 has-text-centered card">
                            <a href="#"> <img src="img/fichaje.png" alt=""></a>
                        </div>
                        <div class="column is-3 has-text-centered card">
                            <a href="#"> <img src="img/convenio.png" alt=""></a>
                        </div>
                        <div class="column is-3 has-text-centered card">
                        <a href="#"> <img src="img/noticias.png" alt=""></a>
                        </div>
                        <div class="column is-1.5"></div>
                    </div>
                </div>
                <!-- Columnas vacías para dar margen a la derecha -->
                <div class="column is-2"></div>
            </div>
        </div>
        <!-- Otro bloque para dar espacio con el Footer -->
        <div class="block"></div>
    </main>
    <!-- FIN DE LA MAIN SECTION -->

    <!-- FOOTER -->
    <footer class="">
        <div class="container logo-nav-container">
            <a href="#">
                <div class="icon-text navbar-item">
                    <span class="icon is-large">
                        <img src="img/flecha-hacia-atras.png" alt="">
                    </span>
                </div>
            </a>
        </div>
    </footer>
    <!-- FIN DEL FOOTER -->
</body>

</html>