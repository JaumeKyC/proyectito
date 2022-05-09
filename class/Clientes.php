<?php

class Clientes
{

    public function consultaClientes()
    {
        $user = "root";
        $pass = "contraseña";
        $server = "localhost";
        $db = "integrado";
        $port = "3306";


        try {
            $bbdd = new PDO("mysql:host=$server; port=$port; dbname=$db", "$user", "$pass");
            $bbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $bbdd->beginTransaction();

            $consulta =  $bbdd->query("SELECT * FROM clientes");

            while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) //mientras hayan resultados, row contendrá los datos de cada registro
            {
                echo "<tr><td>" . $row["ID"] . "</td>
                 <td>" . $row["Nombre"] . "</td> 
                 <td>" . $row["NombreContacto"] . "</td> 
                 <td>" . $row["ApellidoContacto"] . "</td>
                 <td>" . $row["Email"] . "</td> 
                 <td>" . $row["Telefono"] . "</td> 
                 <td>" . $row["DireccionCalle"] . "</td> 
                 <td>" . $row["DireccionNumero"] . "</td> 
                 <td>" . $row["Ciudad"] . "</td> 
                 <td>" . $row["Comunidad"] . "</td>
                 <td>" . $row["Pais"] . "</td> 
                 <td>" . $row["CodPostal"] . "</td>
                 <td> <a href='edit.php?id=" . $row["ID"] . "'><img src='../img/write.png' width='25'></a> </td>
                 <td> <a href='delete.php?id=" . $row["ID"] . "'><img src='../img/borrar.png' width='25'></a> </td></tr>";
            }

            $bbdd->commit();
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una ex excepción:" . $exception->getMessage();
        } finally {
            //Cerramos la conexión
            $bbdd = null;
        }
    }

    public function nuevoCliente($cliente) //cliente será $_POST
    {

        $user = "root";
        $pass = "contraseña";
        $server = "localhost";
        $db = "integrado";
        $port = "3306";

        try {
            $bbdd = new PDO("mysql:host=$server; port=$port; dbname=$db", "$user", "$pass");
            $bbdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $bbdd->beginTransaction();

            $stmt = $bbdd->prepare("INSERT INTO Clientes VALUES (:ID, :Empresa, :NombreContacto, :ApellidoContacto, :Email, :Telefono, :DireccionCalle, :DireccionNumero, :Ciudad, :Comunidad, :Pais, :CodPostal)");

            $stmt->bindParam(':ID', $cliente["ID"], PDO::PARAM_INT);
            $stmt->bindParam(':Nombre', $cliente["Empresa"], PDO::PARAM_STR);
            $stmt->bindParam(':NombreContacto', $cliente["NombreContacto"], PDO::PARAM_STR);
            $stmt->bindParam(':ApellidoContacto', $cliente["ApellidoContacto"], PDO::PARAM_STR);
            $stmt->bindParam(':Email', $cliente["Email"], PDO::PARAM_STR);
            $stmt->bindParam(':Telefono', $cliente["Telefono"], PDO::PARAM_STR);
            $stmt->bindParam(':DireccionCalle', $cliente["DireccionCalle"], PDO::PARAM_STR);
            $stmt->bindParam(':DireccionNumero', $cliente["DireccionNumero"], PDO::PARAM_STR);
            $stmt->bindParam(':Ciudad', $cliente["Ciudad"], PDO::PARAM_STR);
            $stmt->bindParam(':Comunidad', $cliente["Comunidad"], PDO::PARAM_STR);
            $stmt->bindParam(':Pais', $cliente["Pais"], PDO::PARAM_STR);
            $stmt->bindParam(':CodPostal', $cliente["CodPostal"], PDO::PARAM_STR);

            $stmt->execute(); //Ejecuta

            $bbdd->commit();
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una ex excepción:" . $exception->getMessage();
        } finally {
            //Cerramos la conexión
            $bbdd = null;
        }
    }
}
