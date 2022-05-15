<?php

class HeliosCorp extends Connection
{
    public function __construct()
    {
        $this->connect();
    }

    //CLIENTES
    public function getAllClientes()
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

    public function drawClientesList()
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
            $output .= "<td> <a href='edit.php?id=" . $clientes->getId() . "'><img src='../img/write.png' width='25'></a> </td>";
            $output .= "<td> <a href='deleteClientes.php?id=" . $clientes->getId() . "'><img src='../img/borrar.png' width='25'></a> </td>";
            $output .= "</tr>";
        }
        return $output;
    }

    public function deleteClientes($id)
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
    public function getAllPedidos()
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

    public function drawPedidosList()
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
    public function getStock($id_producto)
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

    public function drawCantidadOptions(){
        
    }

    public function drawProductosOptions()
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

    public function drawClientesOptions(){
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
    public function getAllProductos()
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

    public function drawProductosList()
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
