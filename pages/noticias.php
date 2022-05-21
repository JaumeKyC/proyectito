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
    <meta name="viewport" content="width=device-width">
    <link rel="icon" href="img/logoico.ico">
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

    <main class="">
        <!-- Block para dar espacio con el header, uno vacío primero para que haya un espacio con el segundo -->
        <div class="block"></div>
        <!-- PRIMER BLOQUE PARA 3 BOTONES PRINCIPALES -->
        <div class="block">
            <!-- Dividimos en columnas -->
            <div class="columns margen2">
                <!-- Columnas vacías para dar margen a la izquierda -->
                <div class="column is-1"></div>
                <!-- Columnas que será donde vaya el contenido de la página en cuestión -->
                <div class="column is-5">

                        <div class="columns card">
                            <div class="column is-5">
                                <div class="columns">
                                    <img src="../img/menu/nuevaterminal.jpg">
                                </div>
                            </div>
                            <div class="column is-7 card ">
                               <div class="noticias">
                                <h1>Helios Corp abre una nueva terminal logística</h1>
                                <br>
                                <p>Helios Corp abre una nueva terminal logística en la capital búlgara, Sofía. Dado que Helios Corp celebra su 25.° aniversario en el país, la nueva terminal reemplaza la antigua ubicación para procesar el mayor volumen de logística y garantizar aún más los estándares de alta calidad de servicios sostenibles.</p>
                                <p>El edificio está equipado con nuevas tecnologías y un moderno software de almacén para ampliar aún más las capacidades logísticas que gestionan todos los servicios</p>

                               </div>
                            </div>
                            <div class="column is-1"></div>
                        </div>

                        <div class="column is-1"></div>
                    </form>
                    <!-- FIN DEL CONTENIDO DE LA PÁGINA -->
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
                                <h1>Más de 100 empleados se solidarizan</h1>
                                <br>
                                <p>Helios Corp celebró durante semanas el Día Mundial del Voluntariado (GVD) los pasados meses de septiembre y octubre. Periodo en el que especialmente se anima a los empleados a contribuir con la comunidad más próxima. Las actividades son tan diversas como la plantilla del Grupo y van desde programas educativos en Madagascar, donaciones de equipos de protección en Panamá apoyo a los jóvenes con autismo en Malasia, reforestacion de arboles en el amazonas y muchas otras actividades.</p>
                               </div>
                            </div>
                            <div class="column is-1"></div>
                        </div>

                        <div class="column is-1"></div>
                    </form>
                    <!-- FIN DEL CONTENIDO DE LA PÁGINA -->
                </div>
                <!-- Columnas vacías para dar margen a la derecha -->
                <div class="column is-1"></div>
            </div>
            
            </div>
            <div class="block">
            <!-- Dividimos en columnas -->

            <div class="columns">
                <!-- Columnas vacías para dar margen a la izquierda -->
                <div class="column is-1"></div>
                <!-- Columnas que será donde vaya el contenido de la página en cuestión -->
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
                                <p>Tenemos previsto adquirir hasta 2.000 robots colaborativos, convirtiéndose además en el mayor cliente de Locus Robotics a escala mundial.  Los robots colaborativos, especializados en picking asistido, son especialmente útiles para agilizar la operativa de la compañía en sus almacenes enfocados a dar servicio a clientes eCommerce y del sector Retail/Consumo, ayudando en la rápida preparación de pedidos y reposición de inventarios que necesitan estos entornos, y aumentando la eficiencia de los procesos.</p>
                               </div>
                            </div>
                            <div class="column is-1"></div>
                        </div>

                        <div class="column is-1"></div>
                    </form>
                    <!-- FIN DEL CONTENIDO DE LA PÁGINA -->
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
                                <p>Anunciamos la renovación de la colaboración como partner logístico que mantiene con MediChain, líder mundial en productos y servicios destinados a pacientes con insuficiencia renal crónica y aguda. Mediante la ampliación del contrato, en Helios Corp integramos todos los servicios logísticos de MediChain para la península ibérica e Islas Canarias añadiendo nuevas áreas al operativo que desarrolla para la compañía. Asimismo, hemos aumentado el personal puesto a disposición de la compañía en el centro logístico.</p>
                               </div>
                            </div>
                            <div class="column is-1"></div>
                        </div>

                        <div class="column is-1"></div>
                    </form>
                    <!-- FIN DEL CONTENIDO DE LA PÁGINA -->
                </div>
                <!-- Columnas vacías para dar margen a la derecha -->
                <div class="column is-1"></div>
            </div>
            
            </div>
        <!-- FIN DE LA MAIN SECTION -->
    </main>
    <!-- FOOTER -->
    <footer class="footer2">
        <div class="container logo-nav-container">
            <a href="../otros.php">
                <!-- <div class="icon-text navbar-item"> -->
                <span class="icon is-large">
                    <img class="flechaAtras" src="../img/flecha-hacia-atras.png" alt="">
                </span>
                <!-- </div> -->
            </a>
        </div>
    </footer>
    <!-- FIN DEL FOOTER -->
</body>
<?php
if (count($_POST) > 0) {
    var_dump($_POST);
}
?>

</html>