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
                                <span class="user"><?= ucfirst($_SESSION["user"])?></span>
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
                        <form action="" method="POST">
                            <div class="columns">
                                <!-- <div class="column is-1"></div> -->
                                <div class="column is-11 card ">
                                    <div class="columns">
                                        <div class="column is-7">
                                            <div class="columns">
                                                <div class="column is-7 margenPedido1">
                                                <label class="label">ID</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Text input" required name="id" value="<?=$_GET["ID_Pedido"]?>" readonly>
                                </div>

                                <label class="label">Cliente</label>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Text input" required name="Empresa" value="<?=$_GET["ID_Cliente"]?>" readonly>
                                </div>
                                
                                <div class="block"></div>
                                <label class="label">Producto</label>
                                <div class="control">
                                    <div class="select">
                                        <select required name="Producto">
                                            <?= $helios->drawProductosOptions() ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="block"></div>
                                <label class="label">Cantidad</label>
                                <div class="control">
                                    <input class="input" type="number" placeholder="Text input" required name="id" value="">
                                </div>
                                <div class="block"></div>

                                <div class="field is-grouped">
                                    
                                    <div class="control">
                                        <button href="#" type="submit" method="POST" class="button is-link">Agregar</button>
                                    </div>
                                    
                                    <div class="control">
                                        <button href="./clientes.php" type="button" class="button is-link is-light">Cancelar</button>
                                    </div>
                                </div>
                                                </div>
                                                <div class="column is-5"></div>
                                            </div>
                                        </div>
                                        <div class="column is-5 card">
                                        <div class="content">
                                        <?=$helios->getPedidosProducto($_GET["ID_Pedido"])?>
                                        <?=$helios->getImporteTotal($_GET["ID_Pedido"])?>


                                        </div>
                                        </div>
                                        <div class="column is-1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-1"></div>
                    </div>
                    </form>
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
if (count($_POST) > 0) {
    var_dump($_POST);
}
?>

</html>