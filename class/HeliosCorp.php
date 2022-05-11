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
            $output .= "<td> <a href='delete.php?id=" . $clientes->getId() . "'><img src='../img/borrar.png' width='25'></a> </td>";
            $output .= "</tr>";
        }
        return $output;
    }

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
            $output .= "<td> <a href='delete.php?id=" . $pedidos->getIdPedido() . "'><img src='../img/borrar.png' width='25'></a> </td>";
            $output .= "</tr>";
        }
        return $output;
    }

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
            $output .= "<td> <a href='delete.php?id=" . $productos->getIdProducto() . "'><img src='../img/borrar.png' width='25'></a> </td>";
            $output .= "</tr>";
        }
        return $output;
    }
}
