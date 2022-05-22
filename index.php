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

<body>
    <div class="margenlogin columns is-mobile">
        <div class="column is-4"></div>

        <div class="column is-4 has-text-centered">
            <figure class="image ">
                <img src="img/logo5.png">
            </figure>
            <div class="columns">
                <div class="column is-2"></div>
                <div class="column is-8 has-text-centered">

                    <form method="post" action="./pages/login1.php">
                        <h1>¡Bienvenido/a!</h1>
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error" style="color:red"> <?php echo $_GET['error']; ?> </p>
                        <?php } ?>
                        <div class="field ">
                            <label class="label has-text-right ">Usuario</label>
                            <div class="control">
                                <input class="input is-info" name="user" type="text" placeholder="Usuario">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label has-text-right">Contraseña</label>
                            <div class="control">
                                <input class="input" name="password" type="password" placeholder="Password">
                            </div>
                        </div>
                        <button class="button is-link is-rounded  has-button-right" type="submit">Validar</button>
                    </form>
                </div>
                <div class="column is-2"></div>
            </div>
        </div>
        <div class="column is-4"></div>
    </div>
    </div>
</body>

</html>