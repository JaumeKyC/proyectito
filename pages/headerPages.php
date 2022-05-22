<?php 

//Jaume
require_once "autoloader.php"; ?>
<!DOCTYPE html>
<html lang="en">
<body>
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
                        <a href="logout.php">
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
</body>
</html>