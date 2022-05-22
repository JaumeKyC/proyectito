<?php
//Jaume 
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="css/general-style.css">
    <title>Helios Corp.</title>
</head>

<body class="">
    <?php include('header.php') ?>
    <main>
        <div class="block"></div>
        <div class=" margen1 columns is-mobile">
            <div class="column is-2"></div>
            <div class="column is-8 ">
                <div class="columns">
                    <div class="column is-6 has-text-centered titulo-imagen">
                        <a href="BOE-A-2021-9764.pdf" download="GrandesAlmacenes"> <img class="img-button" src="img/menu/convenio2.jpg" alt="">
                            <div class="titulo-centrado">Convenio</div>
                        </a>
                    </div>
                    <div class="column is-6 has-text-centered titulo-imagen">
                        <a href="./pages/noticias.php"> <img class="img-button" src="img/menu/noticias2.jpg" alt="">
                            <div class="titulo-centrado">Noticias</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="column is-2"></div>
        </div>
        <footer class="footer">
            <div class="container logo-nav-container">
                <a href="indexMenu.php">
                    <span class="icon is-large">
                        <img src="img/flecha-hacia-atras.png" alt="" class="flechaAtras">
                    </span>
                </a>
            </div>
        </footer>
</body>

</html>