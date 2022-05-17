<?php

class Security extends Connection
{

    public function __construct()
    {
        $this->connect();
    }

    //LOGIN
    public function validate($post)
    {
        try {
            $sql = $this->bbdd->prepare("SELECT * FROM login WHERE usuario='" . $post["user"] . "' AND contraseña='" . $post["password"] . "'");
            $sql->execute();

            return $sql->rowCount() == 0 ? null : $sql->fetch(PDO::FETCH_ASSOC);
        } catch (Exception | PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
    }

    public function logIn($post)
    {
        if ($this->validate($post) > 0) {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            if (isset($post["user"])) {
                $_SESSION["user"] = $post["user"];
            } else if (isset($_SESSION["user"])) {
                session_unset();
                $_SESSION["user"] = $post["user"];
            }
            header("Location: ../indexMenu.php");
        } else {
            if (empty($post["user"])) {
                header("Location: ../index.php?error=User is required");
                exit();
            } elseif (empty($post["password"])) {
                header("Location: ../index.php?error=Password is required");
                exit();
            } else {
                header("Location: ../index.php?error=Wrong User or Password");
            }
        };
    }

    public function logOut()
    {
        session_start();

        session_unset();

        session_destroy();

        header("Location: ../index.php");
    }
}
