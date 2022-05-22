<?php
//Jaume y Lenin

session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../index.php?error=Insert User and Password");
}
require_once 'autoloader.php';
$helios = new HeliosCorp();
if (count($_POST) > 1) {
    var_dump($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <?php include('headerPages.php')?>
    <main>
        
        <div class="columns espaciadoSearcher ">
            <div class="column is-8"></div>
            <div class="column is-2">
                <form method="post" action="#">
                    <div class=" field">
                        <div class="control ">
                            <input class="input is-link  is-small " name="filter" type="text" placeholder="Filtrar por empresa">
                        </div>
                    </div>

            </div>
            <div class="column is-1">
                <div class="control ">
                    <button href="#" type="submit" method="POST" class="button is-link is-outlined is-small">Aceptar</button>
                </div>
            </div>
            </form>
            <div class="column is-1"></div>
        </div>
       
        <div class="block">
           
            <div class="columns is-mobile">
                
                <div class="column is-1"></div>
               
                <div class="column is-10 ">

                    <div class="block">
                      
                        <div class="table-container">
                            <table class="datatable table is-hoverable is-centered table is-fullwidth">
                                
                                <thead>
                                    <tr>
                                        <th class="">ID</th>
                                        <th class="">Empresa</th>
                                        <th class="">Email</th>
                                        <th class="">Teléfono</th>
                                        <th class="">País</th>
                                        <th class="" colspan="3">Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                </tfoot>
                                <tbody>
                                    <?php
                                    echo $helios->drawClientesList($_SESSION["isAdmin"]);
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="column is-1"></div>
            </div>
        </div>
        <div class="block" id="clientitos">
            <div id="pop-up">
                <div class="columns">
                    <div class="column is-12 ">
                        <div class="">
                            <form action="new.php" id="insertForm" method="POST">
                                <div class="columns">
                                    <div class="column is-1"></div>

                                    <div class="column is-5">

                                        <label class="label">ID</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="id" value="<?= $helios->maxIDCliente() ?>" readonly>
                                        </div>

                                        <label class="label">Empresa</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="nombre">
                                        </div>

                                        <label class="label">Nombre del Contacto</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="nombreContacto">
                                        </div>

                                        <label class="label">Apellidos del Contacto</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="apellidoContacto">
                                        </div>

                                        <label class="label">Teléfono</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="telefono">
                                        </div>

                                        <label class="label">Calle</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="direccionCalle">
                                        </div>
                                    </div>
                                    <div class="column is-5">
                                        <label class="label">Número</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="direccionNumero">
                                        </div>

                                        <label class="label">Ciudad</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="ciudad">
                                        </div>

                                        <label class="label">Comunidad</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="comunidad">
                                        </div>

                                        <label class="label">País</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required value="España" name="pais">
                                        </div>

                                        <label class="label">Cod. Postal</label>
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Text input" required name="codPostal">
                                        </div>

                                        <div class="field">
                                            <label class="label">Email</label>
                                            <div class="control">
                                                <input class="input" type="email" placeholder="Email input" required value="" name="email">
                                            </div>
                                        </div>
                                        <div class="field is-grouped">
                                            <div class="control">
                                                <button type="submit" method="POST" class="button is-link">Aceptar</button>
                                            </div>
                                            <div class="control">
                                                <button id="cancelar-pop-up" type="button" class="button is-link is-light">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-1 "></div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block" id="detallitos">
            <div id="pop-up">
                <div class="columns">
                    <div class="column is-12 ">
                        <div class="">
                            <table id="infoCliente" class=" table has-text-centered is-bordered is-stripped is-narrow">  
                            </table>
                        </div>
                        <div class="block"></div>
                        <div class="columns">
                            <div class="control column is-9"></div>
                            <div class="control column is-2">
                                <button id="cancelar-pop-up-info" type="button" class="button is-link is-light ">Salir</button>
                            </div>
                            <div class="control column is-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block" id="editaditos">
            <div id="pop-up">
                <div class="columns">
                    <div class="column is-12 ">
                        <div class="">
                            <form action="editClient.php" id="insertForm" method="POST">
                                <div class="columns">
                                    <div class="column is-1"></div>
                                    <div class="column is-5">
                                        <label class="label">ID</label>
                                        <div class="control">
                                            <input class="input input2" type="text" placeholder="Text input" required name="id" value="" readonly>
                                        </div>

                                        <label class="label">Empresa</label>
                                        <div class="control">
                                            <input class="input input2" type="text" placeholder="Text input" required name="nombre" value="">
                                        </div>

                                        <label class="label ">Nombre del Contacto</label>
                                        <div class="control">
                                            <input class="input input2" type="text" placeholder="Text input" required name="nombreContacto" value="">
                                        </div>

                                        <label class="label">Apellidos del Contacto</label>
                                        <div class="control">
                                            <input class="input input2" type="text" placeholder="Text input" required name="apellidoContacto" value="">
                                        </div>

                                        <label class="label ">Email</label>
                                        <div class="control">
                                            <input class="input input2" type="email" placeholder="Email input" required value="" name="email" value="">
                                        </div>

                                        <label class="label">Teléfono</label>
                                        <div class="control">
                                            <input class="input input2" type="text" placeholder="Text input" required name="telefono" value="">
                                        </div>
                                    </div>
                                    <div class="column is-5">
                                        <label class="label">Calle</label>
                                        <div class="control">
                                            <input class="input input2" type="text" placeholder="Text input" required name="direccionCalle" value="">
                                        </div>

                                        <label class="label">Número</label>
                                        <div class="control">
                                            <input class="input input2" type="text" placeholder="Text input" required name="direccionNumero" value="">
                                        </div>

                                        <label class="label">Ciudad</label>
                                        <div class="control">
                                            <input class="input input2" type="text" placeholder="Text input" required name="ciudad" value="">
                                        </div>

                                        <label class="label">Comunidad</label>
                                        <div class="control">
                                            <input class="input input2" type="text" placeholder="Text input" required name="comunidad" value="">
                                        </div>

                                        <label class="label">País</label>
                                        <div class="control">
                                            <input class="input input2" type="text" placeholder="Text input" required value="España" name="pais" value="">
                                        </div>
                                        <div class="field">
                                            <label class="label">Cod. Postal</label>
                                            <div class="control">
                                                <input class="input input2" type="text" placeholder="Text input" required name="codPostal" value="">
                                            </div>
                                        </div>
                                        <div class="field is-grouped">
                                            <div class="control">
                                                <button type="submit" method="POST" class="button is-link">Aceptar</button>
                                            </div>
                                            <div class="control">
                                                <button id="cancelar2-pop-up" type="button" class="button is-link is-light">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-1 "></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block" id="borraditos">
            <div id="pop-up">
                <div class="columns">
                    <div class="column is-12 ">
                        <form action="" id="deleteClientes" method="POST">
                            <div class="block">Estás a punto de borrar el cliente.</div>
                            <div class="columns">
                                <div class="column is-1"></div>
                                <div class="column is-10">
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <button type="submit" method="POST" class="button is-link">Aceptar</button>
                                        </div>
                                        <div class="control">
                                            <button id="cancelar-pop-up-delete" type="button" class="button is-link is-light">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="column is-1"></div>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
        <div class="block"></div>
    </main>
    <footer class="footer2">
        <div class="container logo-nav-container">
            <a href="../indexAlmacen.php">
                <span class="icon is-large">
                    <img src="../img/flecha-hacia-atras.png" alt="">
                </span>
            </a>
            <span>
                <input id="pop-up-cliente" class="button is-link is-right" type="button" value="Nuevo">
            </span>
    </footer>
</body>

</html>