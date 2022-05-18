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
                                <div class="column is-2"></div>

                                <div class="column is-4">

                                    <label class="label">ID</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input" required name="ID">
                                    </div>

                                    <label class="label">Empresa</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input" required name="Empresa">
                                    </div>

                                    <label class="label">Nombre del Contacto</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input" required name="NombreContacto">
                                    </div>

                                    <label class="label">Apellidos del Contacto</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input" required name="ApellidoContacto">
                                    </div>

                                    <label class="label">Teléfono</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input" required name="Telefono">
                                    </div>

                                    <label class="label">Calle</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input" required name="DireccionCalle">
                                    </div>
                                </div>
                                <div class="column is-4">
                                    <label class="label">Número</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input" required name="DireccionNumero">
                                    </div>

                                    <label class="label">Ciudad</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input" required name="Ciudad">
                                    </div>

                                    <label class="label">Comunidad</label>
                                    <div class="control">
                                        <div class="select">
                                            <select required name="Comunidad">
                                                <option value="">Elige Provincia</option>
                                                <option value="Álava/Araba">Álava/Araba</option>
                                                <option value="Albacete">Albacete</option>
                                                <option value="Alicante">Alicante</option>
                                                <option value="Almería">Almería</option>
                                                <option value="Asturias">Asturias</option>
                                                <option value="Ávila">Ávila</option>
                                                <option value="Badajoz">Badajoz</option>
                                                <option value="Baleares">Baleares</option>
                                                <option value="Barcelona">Barcelona</option>
                                                <option value="Burgos">Burgos</option>
                                                <option value="Cáceres">Cáceres</option>
                                                <option value="Cádiz">Cádiz</option>
                                                <option value="Cantabria">Cantabria</option>
                                                <option value="Castellón">Castellón</option>
                                                <option value="Ceuta">Ceuta</option>
                                                <option value="Ciudad Real">Ciudad Real</option>
                                                <option value="Córdoba">Córdoba</option>
                                                <option value="Cuenca">Cuenca</option>
                                                <option value="Gerona/Girona">Gerona/Girona</option>
                                                <option value="Granada">Granada</option>
                                                <option value="Guadalajara">Guadalajara</option>
                                                <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                                                <option value="Huelva">Huelva</option>
                                                <option value="Huesca">Huesca</option>
                                                <option value="Jaén">Jaén</option>
                                                <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                                                <option value="La Rioja">La Rioja</option>
                                                <option value="Las Palmas">Las Palmas</option>
                                                <option value="León">León</option>
                                                <option value="Lérida/Lleida">Lérida/Lleida</option>
                                                <option value="Lugo">Lugo</option>
                                                <option value="Madrid">Madrid</option>
                                                <option value="Málaga">Málaga</option>
                                                <option value="Melilla">Melilla</option>
                                                <option value="Murcia">Murcia</option>
                                                <option value="Navarra">Navarra</option>
                                                <option value="Orense/Ourense">Orense/Ourense</option>
                                                <option value="Palencia">Palencia</option>
                                                <option value="Pontevedra">Pontevedra</option>
                                                <option value="Salamanca">Salamanca</option>
                                                <option value="Segovia">Segovia</option>
                                                <option value="Sevilla">Sevilla</option>
                                                <option value="Soria">Soria</option>
                                                <option value="Tarragona">Tarragona</option>
                                                <option value="Tenerife">Tenerife</option>
                                                <option value="Teruel">Teruel</option>
                                                <option value="Toledo">Toledo</option>
                                                <option value="Valencia">Valencia</option>
                                                <option value="Valladolid">Valladolid</option>
                                                <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                                                <option value="Zamora">Zamora</option>
                                                <option value="Zaragoza">Zaragoza</option>
                                            </select>
                                        </div>
                                    </div>

                                    <label class="label">País</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input" required value="España" name="Pais">
                                    </div>

                                    <label class="label">Cod. Postal</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Text input" required name="CodPostal">
                                    </div>

                                    <div class="field">
                                        <label class="label">Email</label>
                                        <div class="control">
                                            <input class="input" type="email" placeholder="Email input" required value="" name="Email">
                                        </div>
                                    </div>

                                    <div class="field is-grouped">
                                        <div class="control">
                                            <button href="#" type="submit" method="POST" class="button is-link">Aceptar</button>
                                        </div>
                                        <div class="control">
                                            <button href="./clientes.php" type="button" class="button is-link is-light">Cancelar</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="column is-2"></div>
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