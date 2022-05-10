<?php

class HeliosCorp extends Connection
{
    public function __construct()
    {

        $this->connect();
    }

    public function getAllClientes()
    {
        try {
            //Crea un "punto de restauración" al que volver si todas las acciones no se completan correctamente.
            $this->bbdd->beginTransaction();

            //Creamos la consulta y la almacenamos en una variable
            $stmt = $this->bbdd->prepare("SELECT * FROM clientes");

            //Ejecutamos la consulta
            $stmt->execute();
            $clientes = [];

            //Mientras hayan resultados en la consulta, itererá y row contendrá los datos de cada uno de los registros.
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {   //Creamos un objeto Employee con los datos de cada registro
                $objeto = new Clientes($row['ID'], $row['Nombre'], $row['NombreContacto'], $row['ApellidoContacto'], $row['Email'], $row['Telefono'], $row['DireccionCalle'], $row['DireccionNumero'], $row['Ciudad'], $row['Comunidad'], $row['Pais'], $row['CodPostal']);
                //Pusheamos el objeto al array de clientes;
                array_push($clientes, $objeto);
            }
            $this->bbdd->commit();

            return $clientes;
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una ex excepción:" . $exception->getMessage();
        }
    }

    public function drawClientesList()
    {
        $clientes = $this->getAllClientes();
        $output= "";

        foreach ($clientes as $clientes) {
            $output .= "<tr><td>" . $clientes->getId() . "</td>";
            $output .= "<td>" . $clientes->getNombre() . "</td>";
            $output .= "<td>" . $clientes->getNombreContacto() . "</td>";
            $output .= "<td>" . $clientes->getApellidoContacto() . "</td>";
            $output .= "<td>" . $clientes->getEmail() . "</td>";
            $output .= "<td>" . $clientes->getTelefono() . "</td>";
            $output .= "<td>" . $clientes->getDireccionCalle() . "</td>";
            $output .= "<td>" . $clientes->getDireccionNumero() . "</td>";
            $output .= "<td>" . $clientes->getCiudad() . "</td>";
            $output .= "<td>" . $clientes->getComunidad() . "</td>";
            $output .= "<td>" . $clientes->getPais() . "</td>";
            $output .= "<td>" . $clientes->getCodPostal() . "</td>";
            $output .= "<td> <a href='edit.php?id=" . $clientes->getId() . "'><img src='../img/write.png' width='25'></a> </td>";
            $output .= "<td> <a href='delete.php?id=" . $clientes->getId() . "'><img src='../img/borrar.png' width='25'></a> </td>";
            $output .= "</tr>";
        }
        return $output;
    }

}