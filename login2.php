<?php

include "db_conn.php";

if (isset($_POST["user"]) && isset($_POST["password"])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$user = validate($_POST["user"]);
$password = validate($_POST["password"]);

if (empty($user)) {
    header("Location: index.php?error=User Name is required");
    exit();
} elseif (empty($password)) {
    header("Location: index.php?error=Password is required");
    exit();
}

$sql = "SELECT * FROM login WHERE usuario='" . $user . "' AND contraseña='" . $password . "'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['usuario'] === $user && $row['contraseña'] === $password) {
        echo "Logged In";

        $_SESSION["user"] = $row['usuario'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["id"] = $row['id'];
        header("Location: mainMenu.php");
        exit();
    } else {
        header("Location: index.php?error=Incorrect User or Password");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
