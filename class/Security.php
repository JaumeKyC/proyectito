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
            $sql = $this->bbdd->prepare("SELECT * FROM login WHERE user='" . $post["user"] . "'");
            $sql->execute();
            $user = $sql->fetch(PDO::FETCH_ASSOC);
            return ($sql->rowCount() > 0 && (password_verify($post["password"], $user["password"])))? $user : null ;
        } catch (Exception | PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
    }

    public function logIn($post)
    {
        $user = $this->validate($post);
        if ($user !== null) {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            if (isset($user)) {
                $_SESSION = $user;
            } else if (isset($_SESSION)) {
                session_unset();
                $_SESSION = $user;
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
