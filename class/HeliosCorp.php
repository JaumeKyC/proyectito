<?php

class HeliosCorp extends Connection
{
    public function __construct()
    {
        $this->connect();
    }

    //CLIENTES
    public function getAllClientes() //Devuelve un array de objetos con todos los clientes
    {
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT * FROM clientes");
            $stmt->execute();
            $clientes = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $objeto = new Clientes(
                    $row['ID'],
                    $row['Nombre'],
                    $row['NombreContacto'],
                    $row['ApellidoContacto'],
                    $row['Email'],
                    $row['Telefono'],
                    $row['DireccionCalle'],
                    $row['DireccionNumero'],
                    $row['Ciudad'],
                    $row['Comunidad'],
                    $row['Pais'],
                    $row['CodPostal']
                );
                array_push($clientes, $objeto);
            }
            $this->bbdd->commit();
            return $clientes;
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una ex excepción:" . $exception->getMessage();
        }
    }

    public function drawClientesList() //Crea la tabla a partir del array de objetos clientes
    {
        $clientes = $this->getAllClientes();
        $output = "";

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
            $output .= "<td> <a href='infoCliente.php?id=" . $clientes->getId() . "'><img src='../img/info.png' width='25'></a> </td>";
            $output .= "<td> <a href='edit.php?id=" . $clientes->getId() . "'><img src='../img/write.png' width='25'></a> </td>";
            $output .= "<td> <a href='deleteClientes.php?id=" . $clientes->getId() . "'><img src='../img/borrar.png' width='25'></a> </td>";
            $output .= "</tr>";
        }
        return $output;
    }

    public function getCliente($id) //Devuelve la info de un solo cliente al pasarle el ID
    {
        try {
            $stmtClient = $this->bbdd->prepare("SELECT * FROM clientes WHERE id = :id");
            $stmtClient->bindParam(':id', $id, PDO::PARAM_STR);
            if ($stmtClient->execute() && $stmtClient->rowCount() > 0) {
                $cliente = $stmtClient->fetch(PDO::FETCH_ASSOC);
                return new Clientes(
                    $cliente['ID'],
                    $cliente['Nombre'],
                    $cliente['NombreContacto'],
                    $cliente['ApellidoContacto'],
                    $cliente['Email'],
                    $cliente['Telefono'],
                    $cliente['DireccionCalle'],
                    $cliente['DireccionNumero'],
                    $cliente['Ciudad'],
                    $cliente['Comunidad'],
                    $cliente['Pais'],
                    $cliente['CodPostal']
                );
            }
        } catch (Exception | PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
        return new Clientes(null, null, null, null, null, null,null, null, null, null, null, null);
    }

    public function drawClienteInfo($id) //Crea la tabla de información del cliente
    {
        $cliente = $this->getCliente($id);
        $output = "";
        $output .= "<tr><th>Id</th><td>" . $cliente->getId() . "</td></tr>";

        return $output;
    }

    public function deleteClientes($id) //Elimina el cliente
    {
        try {
            $stmtDelete = $this->bbdd->prepare("DELETE FROM clientes WHERE id = :id");
            $stmtDelete->bindParam(':id', $id, PDO::PARAM_STR);
            $stmtDelete->execute();
            return $stmtDelete->rowCount();
        } catch (Exception | PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
    }

    //PEDIDOS
    public function getAllPedidos() //Devuelve un array de objetos con todos los pedidos
    {
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT * FROM pedidos ORDER BY Fecha_Pedido DESC");
            $stmt->execute();
            $pedidos = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $objeto = new Pedidos(
                    $row['ID_Pedido'],
                    $row['ID_Cliente'],
                    $row['Fecha_Pedido'],
                    $row['Fecha_Esperada'],
                    $row['Fecha_Entrega'],
                    $row['Estado'],
                    $row['Importe']
                );
                array_push($pedidos, $objeto);
            }
            $this->bbdd->commit();
            return $pedidos;
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una ex excepción:" . $exception->getMessage();
        }
    }

    public function drawPedidosList() //Crea la tabla a partir del array de objetos pedido
    {

        $pedidos = $this->getAllPedidos();
        $output = "";

        foreach ($pedidos as $pedidos) {
            $output .= "<tr><td>" . $pedidos->getIdPedido() . "</td>";
            $output .= "<td>" . $pedidos->getIdCliente() . "</td>";
            $output .= "<td>" . $pedidos->getFechaPedido() . "</td>";
            $output .= "<td>" . $pedidos->getFechaEsperada() . "</td>";
            $output .= "<td>" . $pedidos->getFechaEntrega() . "</td>";
            $output .= "<td>" . $pedidos->getEstado() . "</td>";
            $output .= "<td>" . $pedidos->getImporte() . "</td>";
            $output .= "<td> <a href='info.php?id=" . $pedidos->getIdPedido() . "'><img src='../img/info.png' width='25'></a> </td>";
            $output .= "<td> <a href='edit.php?id=" . $pedidos->getIdPedido() . "'><img src='../img/write.png' width='25'></a> </td>";
            $output .= "<td> <a href='deletePedidos.php?id=" . $pedidos->getIdPedido() . "'><img src='../img/borrar.png' width='25'></a> </td>";
            $output .= "</tr>";
        }
        return $output;
    }

    //NEW PEDIDO
    public function getStock($id_producto) //Devuelve el stock de un producto al pasarle el ID
    {
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT CantidadEnStock AS stock FROM productos  WHERE ID_Producto=$id_producto");
            $stmt->execute();
            $stock = $stmt->fetch(PDO::FETCH_ASSOC)["stock"];
            $this->bbdd->commit();
            return $stock;
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una ex excepción:" . $exception->getMessage();
        }
    }

    public function drawCantidadOptions() //Crea el desplegable con la cantidad leyendo la base de datos
    {
    }

    public function drawProductosOptions() //Crea el desplegable con los productos de la base de datos
    {
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT * FROM productos");
            $stmt->execute();
            $output = "";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $output .= "<option value='" . $row['ID_Producto'] . "'>" . $row['Nombre'] . "</option>";
            }

            $this->bbdd->commit();
            return $output;
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una ex excepción:" . $exception->getMessage();
        }
    }

    public function drawClientesOptions() //Crea el desplegable con los clientes de la base de datos
    {
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT * FROM clientes");
            $stmt->execute();
            $output = "";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $output .= "<option value='" . $row['ID'] . "'>" . $row['Nombre'] . "</option>";
            }

            $this->bbdd->commit();
            return $output;
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una ex excepción:" . $exception->getMessage();
        }
    }

    //PRODUCTOS
    public function getAllProductos() //Devuelve un array de objetos con todos los productos
    {
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT * FROM productos");
            $stmt->execute();
            $productos = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $objeto = new Productos(
                    $row['ID_Producto'],
                    $row['Nombre'],
                    $row['Proveedor'],
                    $row['Descripción'],
                    $row['CantidadEnStock'],
                    $row['PrecioVenta'],
                    $row['PrecioProveedor']
                );
                array_push($productos, $objeto);
            }
            $this->bbdd->commit();
            return $productos;
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una ex excepción:" . $exception->getMessage();
        }
    }

    public function drawProductosList() //Crea la tabla a partir del array de objetos productos
    {

        $productos = $this->getAllProductos();
        $output = "";

        foreach ($productos as $productos) {
            $output .= "<tr><td>" . $productos->getIdProducto() . "</td>";
            $output .= "<td>" . $productos->getNombre() . "</td>";
            $output .= "<td>" . $productos->getProveedor() . "</td>";
            $output .= "<td>" . $productos->getCantidadStock() . "</td>";
            $output .= "<td>" . $productos->getPrecioVenta() . "</td>";
            $output .= "<td>" . $productos->getPrecioProveedor() . "</td>";
            $output .= "<td> <a href='info.php?id=" . $productos->getIdProducto() . "'><img src='../img/info.png' width='25'></a> </td>";
            $output .= "<td> <a href='edit.php?id=" . $productos->getIdProducto() . "'><img src='../img/write.png' width='25'></a> </td>";
            $output .= "<td> <a href='deleteProductos.php?id=" . $productos->getIdProducto() . "'><img src='../img/borrar.png' width='25'></a> </td>";
            $output .= "</tr>";
        }
        return $output;
    }

    //EXTRA
    function alert($msg)
    {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
}
