<?php

class Connection{
    protected $bbdd;
    protected function connect()
    {
        $fichero = file_get_contents(__DIR__."/../config/db.json");
        $datosDB = json_decode($fichero,true);

        $servername = $datosDB["servername"];
        $username = $datosDB["username"];
        $password = $datosDB["password"];
        $db = $datosDB["db"];

        //Establece la conexión
        try {
            $this->bbdd = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
            $this->bbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

    }
    protected function disconnect()
    {
        $this->bbdd = null;
        
    }
    public function __destruct()
    {
        $this->disconnect();
    }
}