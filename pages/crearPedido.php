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
    <link rel="icon" href="../img/logoico.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="../css/general-style.css">
    <title>Helios Corp.</title>
</head>

<body class="">
  
    <?php include('header.php')?>
  

    <main>
       
        <div class="block"></div>
        

        <div class="columns">
          
            <div class="column is-2"></div>
           
            <div class="column is-8 ">
             
                <div class="columns has-text-centered">
                    <div class="column is-2"></div>
                    <div class="tile is-vertical is-8 tile box">
                        <form action="createPedido.php" method="POST">
                            <label class="label ">Selecciona un cliente:</label>
                            <div class="select is-grouped ">
                                <select required name="ID_Cliente" class="has-text-centered">
                                    <?= $helios->drawClientesOptions() ?>
                                </select>
                            </div>
                            <div class="block"></div>
                            <div class="control">
                            <label class="label ">ID del Pedido:</label> 
                                <input style="width:50%" class="input has-text-centered" type="text" placeholder="" required name="ID_Pedido" value="<?=$helios->maxIDPedido() ?>" readonly>
                            </div>
                            <div class="block"></div>
                            <button href="#" type="submit" method="POST" class="button is-link  ">Crear pedido</button>
                        </form>

                    </div>
                    <div class="column is-2"></div>
                </div>
            </div>
            <div class="column is-2"></div>
        </div>
      
    </main>
    
    <footer class="">
        <div class="container logo-nav-container">
            <a href="./pedidos.php">
                <div class="icon-text navbar-item">
                    <span class="icon is-large">
                        <img src="../img/flecha-hacia-atras.png" alt="">
                    </span>
                </div>
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