<?php

//Jaume
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
    <link rel="stylesheet" href="../css/noticias.css">
    <script src="../js/script.js"></script>
    <title>Helios Corp.</title>
</head>

<body class="">
    <header class="">
        <div class="container logo-nav-container">
            <a href="../indexMenu.php">
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
                        <a href="../index.php">
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
    <main class="">
        <div class="block"></div>
        <div class="block">
            <div class="columns margen2">
                <div class="column is-1"></div>
                <div class="column is-5">
                    <div class="columns card">
                        <div class="column is-5">
                            <div class="columns">
                                <img src="../img/menu/nuevaterminal.jpg">
                            </div>
                        </div>
                        <div class="column is-7 card ">
                            <div class="noticias">
                                <h1>Helios Corp abre una nueva terminal log??stica</h1>
                                <br>
                                <p>Helios Corp abre una nueva terminal log??stica en la capital b??lgara, Sof??a. Dado que Helios Corp celebra su 25.?? aniversario en el pa??s, la nueva terminal reemplaza la antigua ubicaci??n para procesar el mayor volumen de log??stica y garantizar a??n m??s los est??ndares de alta calidad de servicios sostenibles.</p>
                                <p>El edificio est?? equipado con nuevas tecnolog??as y un moderno software de almac??n para ampliar a??n m??s las capacidades log??sticas que gestionan todos los servicios</p>
                            </div>
                        </div>
                        <div class="column is-1"></div>
                    </div>
                    <div class="column is-1"></div>
                    </form>
                </div>
                <div class="column is-5">
                    <div class="columns card">
                        <div class="column is-5">
                            <div class="columns">
                                <img src="../img/menu/solidario.jpg">
                            </div>
                        </div>
                        <div class="column is-7 card ">
                            <div class="noticias">
                                <h1>M??s de 100 empleados se solidarizan</h1>
                                <br>
                                <p>Helios Corp celebr?? durante semanas el D??a Mundial del Voluntariado (GVD) los pasados meses de septiembre y octubre. Periodo en el que especialmente se anima a los empleados a contribuir con la comunidad m??s pr??xima. Las actividades son tan diversas como la plantilla del Grupo y van desde programas educativos en Madagascar, donaciones de equipos de protecci??n en Panam?? apoyo a los j??venes con autismo en Malasia, reforestacion de arboles en el amazonas y muchas otras actividades.</p>
                            </div>
                        </div>
                        <div class="column is-1"></div>
                    </div>
                    <div class="column is-1"></div>
                    </form>
                </div>
                <div class="column is-1"></div>
            </div>
        </div>
        <div class="block">
            <div class="columns">
                <div class="column is-1"></div>
                <div class="column is-5">
                    <div class="columns card">
                        <div class="column is-5">
                            <div class="columns">
                                <img src="../img/menu/robotic.jpg">
                            </div>
                        </div>
                        <div class="column is-7 card ">
                            <div class="noticias">
                                <h1>Se amplia el acuerdo con Locus Robotics</h1>
                                <br>
                                <p>Tenemos previsto adquirir hasta 2.000 robots colaborativos, convirti??ndose adem??s en el mayor cliente de Locus Robotics a escala mundial. Los robots colaborativos, especializados en picking asistido, son especialmente ??tiles para agilizar la operativa de la compa????a en sus almacenes enfocados a dar servicio a clientes eCommerce y del sector Retail/Consumo, ayudando en la r??pida preparaci??n de pedidos y reposici??n de inventarios que necesitan estos entornos, y aumentando la eficiencia de los procesos.</p>
                            </div>
                        </div>
                        <div class="column is-1"></div>
                    </div>
                    <div class="column is-1"></div>
                    </form>
                </div>
                <div class="column is-5">
                    <div class="columns card">
                        <div class="column is-5">
                            <div class="columns">
                                <img src="../img/menu/medichain.jpg">
                            </div>
                        </div>
                        <div class="column is-7 card ">
                            <div class="noticias">
                                <h1>Ampliamos nuestros servicios para MediChain</h1>
                                <br>
                                <p>Anunciamos la renovaci??n de la colaboraci??n como partner log??stico que mantiene con MediChain, l??der mundial en productos y servicios destinados a pacientes con insuficiencia renal cr??nica y aguda. Mediante la ampliaci??n del contrato, en Helios Corp integramos todos los servicios log??sticos de MediChain para la pen??nsula ib??rica e Islas Canarias a??adiendo nuevas ??reas al operativo que desarrolla para la compa????a. Asimismo, hemos aumentado el personal puesto a disposici??n de la compa????a en el centro log??stico.</p>
                            </div>
                        </div>
                        <div class="column is-1"></div>
                    </div>
                    <div class="column is-1"></div>
                    </form>
                </div>
                <div class="column is-1"></div>
            </div>
        </div>
    </main>
    <footer class="footer2">
        <div class="container logo-nav-container">
            <a href="../otros.php">
                <span class="icon is-large">
                    <img class="flechaAtras" src="../img/flecha-hacia-atras.png" alt="">
                </span>
            </a>
        </div>
    </footer>
</body>
<?php
if (count($_POST) > 0) {
    var_dump($_POST);
}
?>

</html>