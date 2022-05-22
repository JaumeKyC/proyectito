<?php
//Lenin
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ./index.php?error=Insert User and Password");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logoico.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="../css/general-style.css">
    <script src="../js/script.js"></script>
    <title>Helios Corp.</title>
</head>

<body class="">
    <header class="">
        <div class="container logo-nav-container">
            <a href="../index.php">
                <img class="main_logo" src="../img/logo5.png" alt="main_logo">
            </a>
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
    <main>
        <div class="block"></div>
        <div class="block">
            <div class="columns">
                <div class="column is-2"></div>
                <div class="column is-8 ">
                    <div class="block">
                    </div>
                </div>
                <div class="column is-2"></div>
            </div>
        </div>
        <footer class="footer">
            <div class="container logo-nav-container">
                <a href="#">
                    <div class="icon-text navbar-item">
                        <span class="icon is-large">
                            <img src="../img/flecha-hacia-atras.png" alt="" class="flechaAtras">
                        </span>
                    </div>
                </a>
            </div>
        </footer>
</body>

</html>