<?php

class HeliosCorp extends Connection
{
    private $filter;
    public function __construct()
    {
        $this->connect();
        $this->setCurrentFilter();
    }

    //CLIENTES
    //Alejandro
    public function newClient($data)
    {
        try {
            $id = $data["id"];
            $nombre = $data["nombre"];
            $nombreContacto = $data["nombreContacto"];
            $apellidoContacto = $data["apellidoContacto"];
            $email = $data["email"];
            $telefono = $data["telefono"];
            $direccionCalle = $data["direccionCalle"];
            $direccionNumero = $data["direccionNumero"];
            $ciudad = $data["ciudad"];
            $comunidad = $data["comunidad"];
            $pais = $data["pais"];
            $codPostal = $data["codPostal"];

            $stmtInsert = $this->bbdd->prepare("INSERT INTO clientes VALUES (:id,:nombre,:nombreContacto,:apellidoContacto,:email,:telefono,:direccionCalle,:direccionNumero,:ciudad,:comunidad,:pais,:codPostal)");
            $stmtInsert->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtInsert->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmtInsert->bindParam(':nombreContacto', $nombreContacto, PDO::PARAM_STR);
            $stmtInsert->bindParam(':apellidoContacto', $apellidoContacto, PDO::PARAM_STR);
            $stmtInsert->bindParam(':email', $email, PDO::PARAM_STR);
            $stmtInsert->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $stmtInsert->bindParam(':direccionCalle', $direccionCalle, PDO::PARAM_STR);
            $stmtInsert->bindParam(':direccionNumero', $direccionNumero, PDO::PARAM_STR);
            $stmtInsert->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
            $stmtInsert->bindParam(':comunidad', $comunidad, PDO::PARAM_STR);
            $stmtInsert->bindParam(':pais', $pais, PDO::PARAM_STR);
            $stmtInsert->bindParam(':codPostal', $codPostal, PDO::PARAM_STR);

            $stmtInsert->execute();
            return $stmtInsert->rowCount();
        } catch (Exception | PDOException $e) {
            echo 'Fall?? la inserci??n: ' . $e->getMessage();
        }
    }
    //Jaume
    public function getAllClientes()
    {
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT * FROM clientes WHERE Nombre LIKE '%" . $this->filter . "%'");
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
            echo "<br> Se ha producido una ex excepci??n:" . $exception->getMessage();
        }
    }
    //Lenin
    public function drawClientesList($admin)
    {
        $clientes = $this->getAllClientes();
        $output = "";
        $disabled = "";
        if ($admin == 0) {
            $disabled = "disabled";
        } else {
            $disabled = "nada";
        }

        foreach ($clientes as $clientes) {
            $output .= "<tr><td>" . $clientes->getId() . "</td>";
            $output .= "<td>" . $clientes->getNombre() . "</td>";
            $output .= "<td>" . $clientes->getEmail() . "</td>";
            $output .= "<td>" . $clientes->getTelefono() . "</td>";
            $output .= "<td>" . $clientes->getPais() . "</td>";
            $output .= "<td> <a class='pop-up-cliente-info' id=" . $clientes->getId() . "><img src='../img/info.png' width='25'></a> </td>";
            $output .= "<td> <a class='pop-up-cliente-edit " . $disabled . "' id=" . $clientes->getId() . "><img src='../img/write.png' width='25'></a> </td>";
            $output .= "<td> <a class='pop-up-cliente-delete " . $disabled . "' id=" . $clientes->getId() . "><img src='../img/borrar.png' width='25'></a> </td>";
            $output .= "</tr>";
        }
        return $output;
    }
    //Diego
    public function getCliente($id)
    {
        try {
            $stmtClient = $this->bbdd->prepare("SELECT * FROM clientes WHERE id = :id");
            $stmtClient->bindParam(':id', $id, PDO::PARAM_STR);
            if ($stmtClient->execute() && $stmtClient->rowCount() > 0) {
                return $stmtClient->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception | PDOException $e) {
            echo 'Fall?? la consulta: ' . $e->getMessage();
        }
        return new Clientes(null, null, null, null, null, null, null, null, null, null, null, null);
    }


    //Diego
    public function deleteClientes($id)
    {
        try {
            $stmtDelete = $this->bbdd->prepare("DELETE FROM clientes WHERE id = :id");
            $stmtDelete->bindParam(':id', $id, PDO::PARAM_STR);
            $stmtDelete->execute();
            return $stmtDelete->rowCount();
        } catch (Exception | PDOException $e) {
            echo 'Fall?? la consulta: ' . $e->getMessage();
        }
    }
    //Diego
    public function editClient($data)
    {
        try {
            $id = $data["id"];
            $nombre = $data["nombre"];
            $nombreContacto = $data["nombreContacto"];
            $apellidoContacto = $data["apellidoContacto"];
            $email = $data["email"];
            $telefono = $data["telefono"];
            $direccionCalle = $data["direccionCalle"];
            $direccionNumero = $data["direccionNumero"];
            $ciudad = $data["ciudad"];
            $comunidad = $data["comunidad"];
            $pais = $data["pais"];
            $codPostal = $data["codPostal"];

            $stmtUpdate = $this->bbdd->prepare("UPDATE clientes  Set Nombre=:nombre, NombreContacto=:nombreContacto, ApellidoContacto=:apellidoContacto, Email=:email, Telefono=:telefono, DireccionCalle=:direccionCalle, DireccionNumero=:direccionNumero, Ciudad=:ciudad, Comunidad=:comunidad, Pais=:pais, CodPostal=:codPostal where ID =:id");
            $stmtUpdate->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtUpdate->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':nombreContacto', $nombreContacto, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':apellidoContacto', $apellidoContacto, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':email', $email, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':telefono', $telefono, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':direccionCalle', $direccionCalle, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':direccionNumero', $direccionNumero, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':comunidad', $comunidad, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':pais', $pais, PDO::PARAM_STR);
            $stmtUpdate->bindParam(':codPostal', $codPostal, PDO::PARAM_STR);

            $stmtUpdate->execute();
            return $stmtUpdate->rowCount();
        } catch (Exception | PDOException $e) {
            echo 'Fall?? la inserci??n: ' . $e->getMessage();
        }
    }

    //PEDIDOS Lenin
    public function getAllPedidos()
    {
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT * FROM pedidos WHERE ID_Cliente LIKE '%" . $this->filter . "%' ORDER BY ID_Pedido DESC");
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
            echo "<br> Se ha producido una ex excepci??n:" . $exception->getMessage();
        }
    }

    public function drawPedidosList($admin)
    {

        $pedidos = $this->getAllPedidos();
        $output = "";

        $disabled = "";
        if ($admin == 0) {
            $disabled = "disabled";
        } else {
            $disabled = "nada";
        }

        foreach ($pedidos as $pedidos) {
            $output .= "<tr><td>" . $pedidos->getIdPedido() . "</td>";
            $output .= "<td>" . $pedidos->getIdCliente() . "</td>";
            $output .= "<td>" . $pedidos->getFechaPedido() . "</td>";
            $output .= "<td>" . $pedidos->getFechaEsperada() . "</td>";
            $output .= "<td>" . $pedidos->getFechaEntrega() . "</td>";
            $output .= "<td>" . $pedidos->getEstado() . "</td>";
            $output .= "<td>" . $pedidos->getImporte() . "???</td>";
            $output .= "<td> <a class='pop-up-pedidos-info' id=" . $pedidos->getIdPedido() . "><img src='../img/info.png' width='25'></a> </td>";
            $output .= "<td> <a class='pop-up-pedidos-edit " . $disabled . "' id=" . $pedidos->getIdPedido() . "><img src='../img/write.png' width='25'></a> </td>";
            $output .= "<td> <a class='pop-up-cliente-delete " . $disabled . "' id=" . $pedidos->getIdPedido() . "><img src='../img/borrar.png' width='25'></a> </td>";
            $output .= "</tr>";
        }
        return $output;
    }

    public function deletePedidos($id)
    {
        try {
            $stmtDelete = $this->bbdd->prepare("DELETE FROM pedidos WHERE ID_Pedido = :id");
            $stmtDelete->bindParam(':id', $id, PDO::PARAM_STR);
            $stmtDelete->execute();
            return $stmtDelete->rowCount();
        } catch (Exception | PDOException $e) {
            echo 'Fall?? la consulta: ' . $e->getMessage();
        }
    }

    public function getDetailPedido($id)
    {
        try {
            $stmtClient = $this->bbdd->prepare("SELECT * FROM detallePedido WHERE ID_Pedido = :id");
            $stmtClient->bindParam(':id', $id, PDO::PARAM_STR);
            if ($stmtClient->execute() && $stmtClient->rowCount() > 0) {
                return $stmtClient->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (Exception | PDOException $e) {
            echo 'Fall?? la consulta: ' . $e->getMessage();
        }
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
            echo "<br> Se ha producido una ex excepci??n:" . $exception->getMessage();
        }
    }

    public function drawCantidadOptions()
    {
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
            echo "<br> Se ha producido una ex excepci??n:" . $exception->getMessage();
        }
    }

    public function drawClientesOptions()
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
            echo "<br> Se ha producido una ex excepci??n:" . $exception->getMessage();
        }
    }

    public function getInsertDetalle($post)
    {
        try {

            $idP = $post["producto"];
            $stmt = $this->bbdd->query("SELECT PrecioVenta AS precioVenta FROM productos WHERE ID_Producto = $idP");
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC)["precioVenta"];
            $idpedido = $post["idpedido"];
            $idproducto = $post["producto"];
            $cantidad = $post["cantidad"];
            $preciounidad = $resultado;


            $stmtInsert = $this->bbdd->prepare("INSERT INTO detallePedido VALUES (:idpedido,:producto,:cantidad,:precioventa)");
            $stmtInsert->bindParam(':idpedido', $idpedido, PDO::PARAM_INT);
            $stmtInsert->bindParam(':producto', $idproducto, PDO::PARAM_STR);
            $stmtInsert->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
            $stmtInsert->bindParam(':precioventa', $preciounidad, PDO::PARAM_STR);


            $stmtInsert->execute();
            return $stmtInsert->rowCount();
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una excepci??n:" . $exception->getMessage();
        }
    }

    public function getPedidosProducto($id)
    {
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT Nombre, Cantidad, PrecioUnidad FROM detallePedido INNER JOIN productos ON detallePedido.ID_Producto = productos.ID_Producto WHERE detallePedido.ID_Pedido = $id");
            $stmt->execute();
            $output = "";
            $output .= "<ul>";
            while ($detalleP = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $output .= "<li>" . $detalleP['Cantidad'] . "x " . $detalleP['Nombre'] . "<br>";
                $output .= $detalleP['PrecioUnidad'] * $detalleP['Cantidad'] . " ??? </li> ";
                $output .= "<br>";
            }
            $output .= "</ul>";
            $this->bbdd->commit();
            return $output;
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una excepci??n:" . $exception->getMessage();
        }
    }

    public function getImporteTotal($id)
    {
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT Importe FROM pedidos WHERE ID_Pedido = $id");
            $stmt->execute();
            $output = "";
            $importe = $stmt->fetch();
            $this->bbdd->commit();
            $output .= "<p> TOTAL: " . $importe[0] . " ??? </p>";
            return $output;
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una excepci??n:" . $exception->getMessage();
        }
    }

    public function createPedido($post)
    {
        try {
            $id_Pedido = $post["ID_Pedido"];
            $id_Ciente = $post["ID_Cliente"];
            $fecha_Entrega = null;
            $estado = "Pendiente";
            $importe = 0;

            $stmtInsert = $this->bbdd->prepare("INSERT INTO pedidos VALUES (:id_Pedido,:id_Ciente,curdate(),(curdate() + interval 7 DAY),:fecha_Entrega,:estado,:importe)");
            $stmtInsert->bindParam(':id_Pedido', $id_Pedido, PDO::PARAM_INT);
            $stmtInsert->bindParam(':id_Ciente', $id_Ciente, PDO::PARAM_INT);
            $stmtInsert->bindParam(':fecha_Entrega', $fecha_Entrega, PDO::PARAM_STR);
            $stmtInsert->bindParam(':estado', $estado, PDO::PARAM_STR);
            $stmtInsert->bindParam(':importe', $importe, PDO::PARAM_STR);


            $stmtInsert->execute();
            return $stmtInsert->rowCount();
        } catch (Exception | PDOException $e) {
            echo 'Fall?? la inserci??n: ' . $e->getMessage();
        }
    }

    public function editPedidos($data)
    {
        try {
            $id = $data["id"];
            $fechaEntrega = $data["fechaEntrega"];
            $estado = $data["estado"];
            if($fechaEntrega == ""){$fechaEntrega=null;}
            if($estado == "Entregado" && $fechaEntrega == null){$fechaEntrega = date('Y-m-d');}

            $stmtInsert = $this->bbdd->prepare("UPDATE pedidos  Set Fecha_Entrega=:fechaEntrega, Estado=:estado WHERE ID_Pedido=:id");
            $stmtInsert->bindParam(':id', $id, PDO::PARAM_INT);
            $stmtInsert->bindParam(':fechaEntrega', $fechaEntrega, PDO::PARAM_STR);
            $stmtInsert->bindParam(':estado', $estado, PDO::PARAM_STR);

            $stmtInsert->execute();
            return $stmtInsert->rowCount();
        } catch (Exception | PDOException $e) {
            echo 'Fall?? la inserci??n: ' . $e->getMessage();
        }
    }

    //PRODUCTOS Alejandro


    public function newProducto($data)

    {
        try {
            $idProducto = $data["idProducto"];
            $nombre = $data["nombre"];
            $proveedor = $data["proveedor"];
            $descripcion = $data["descripcion"];
            $cantidadStock = $data["cantidadStock"];
            $precioVenta = $data["precioVenta"];
            $precioProveedor = $data["precioProveedor"];


            $stmtInsert = $this->bbdd->prepare("INSERT INTO productos VALUES (:idProducto,:nombre,:proveedor,:descripcion,:cantidadStock,:precioVenta,:precioProveedor)");
            $stmtInsert->bindParam(':idProducto', $idProducto, PDO::PARAM_INT);
            $stmtInsert->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmtInsert->bindParam(':proveedor', $proveedor, PDO::PARAM_STR);
            $stmtInsert->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmtInsert->bindParam(':cantidadStock', $cantidadStock, PDO::PARAM_STR);
            $stmtInsert->bindParam(':precioVenta', $precioVenta, PDO::PARAM_STR);
            $stmtInsert->bindParam(':precioProveedor', $precioProveedor, PDO::PARAM_STR);


            $stmtInsert->execute();
            return $stmtInsert->rowCount();
        } catch (Exception | PDOException $e) {
            echo 'Fall?? la inserci??n: ' . $e->getMessage();
        }
    }

    public function getAllProductos()
    {
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT * FROM productos WHERE Nombre LIKE '%" . $this->filter . "%'");
            $stmt->execute();
            $productos = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $objeto = new Productos(
                    $row['ID_Producto'],
                    $row['Nombre'],
                    $row['Proveedor'],
                    $row['Descripci??n'],
                    $row['CantidadEnStock'],
                    $row['PrecioVenta'],
                    $row['PrecioProveedor']
                );
                array_push($productos, $objeto);
            }
            $this->bbdd->commit();
            return $productos;
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una ex excepci??n:" . $exception->getMessage();
        }
    }

    public function getProducto($id)
    {
        try {
            $stmtClient = $this->bbdd->prepare("SELECT * FROM productos WHERE ID_Producto = :id");
            $stmtClient->bindParam(':id', $id, PDO::PARAM_STR);
            if ($stmtClient->execute() && $stmtClient->rowCount() > 0) {
                return $stmtClient->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception | PDOException $e) {
            echo 'Fall?? la consulta: ' . $e->getMessage();
        }
        return new Productos(null, null, null, null, null, null, null);
    }

    public function deleteProductos($id)
    {
        try {
            $stmtDelete = $this->bbdd->prepare("DELETE FROM productos WHERE ID_Producto = :id");
            $stmtDelete->bindParam(':id', $id, PDO::PARAM_STR);
            $stmtDelete->execute();
            return $stmtDelete->rowCount();
        } catch (Exception | PDOException $e) {
            echo 'Fall?? la consulta: ' . $e->getMessage();
        }
    }

    public function drawProductosList($admin)
    {

        $productos = $this->getAllProductos();
        $output = "";

        $disabled = "";
        if ($admin == 0) {
            $disabled = "disabled";
        } else {
            $disabled = "nada";
        }

        foreach ($productos as $productos) {
            $output .= "<tr><td>" . $productos->getIdProducto() . "</td>";
            $output .= "<td>" . $productos->getNombre() . "</td>";
            $output .= "<td>" . $productos->getProveedor() . "</td>";
            $output .= "<td>" . $productos->getCantidadStock() . "</td>";
            $output .= "<td>" . $productos->getPrecioVenta() . "???</td>";
            $output .= "<td>" . $productos->getPrecioProveedor() . "???</td>";
            $output .= "<td> <a class='pop-up-producto-info' id=" . $productos->getIdProducto() . "><img src='../img/info.png' width='25'></a> </td>";
            $output .= "<td> <a class='pop-up-producto-edit " . $disabled . "' id=" . $productos->getIdProducto() . "><img src='../img/write.png' width='25'></a> </td>";
            $output .= "<td> <a class='pop-up-producto-delete " . $disabled . "' id=" . $productos->getIdProducto() . "><img src='../img/borrar.png' width='25'></a> </td>";
            $output .= "</tr>";
        }
        return $output;
    }

    public function editProducto($data)
    {
        try {
            $idProducto = $data["idProducto"];
            $nombre = $data["nombre"];
            $proveedor = $data["proveedor"];
            $descripcion = $data["descripcion"];
            $cantidadStock = $data["cantidadStock"];
            $precioVenta = $data["precioVenta"];
            $precioProveedor = $data["precioProveedor"];


            $stmtInsert = $this->bbdd->prepare("UPDATE productos  Set Nombre=:nombre, Proveedor=:proveedor, Descripci??n=:descripcion, CantidadEnStock=:cantidadEnStock, PrecioVenta=:precioVenta, PrecioProveedor=:precioProveedor where ID_Producto =:id");
            $stmtInsert->bindParam(':id', $idProducto, PDO::PARAM_INT);
            $stmtInsert->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmtInsert->bindParam(':proveedor', $proveedor, PDO::PARAM_STR);
            $stmtInsert->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $stmtInsert->bindParam(':cantidadEnStock', $cantidadStock, PDO::PARAM_STR);
            $stmtInsert->bindParam(':precioVenta', $precioVenta, PDO::PARAM_STR);
            $stmtInsert->bindParam(':precioProveedor', $precioProveedor, PDO::PARAM_STR);


            $stmtInsert->execute();
            return $stmtInsert->rowCount();
        } catch (Exception | PDOException $e) {
            echo 'Fall?? la inserci??n: ' . $e->getMessage();
        }
    }



    //EXTRA Jaume


    public function maxIDCliente()
    {
        try {

            $this->bbdd->beginTransaction();
            $sqlMaxNum = "SELECT max(ID)+1 AS maxIdCliente FROM clientes";
            $resultado = $this->bbdd->query($sqlMaxNum);
            $numero = $resultado->fetch(PDO::FETCH_ASSOC)["maxIdCliente"];
            $this->bbdd->commit();
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una excepci??n:" . $exception->getMessage();
        }
        return $numero;
    }

    public function maxIDPedido()
    {
        try {

            $this->bbdd->beginTransaction();
            $sqlMaxNum = "SELECT max(ID_Pedido)+1 AS maxIdPedido FROM pedidos";
            $resultado = $this->bbdd->query($sqlMaxNum);
            $numero = $resultado->fetch(PDO::FETCH_ASSOC)["maxIdPedido"];
            $this->bbdd->commit();
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una excepci??n:" . $exception->getMessage();
        }
        return $numero;
    }

    public function maxIDProducto()
    {
        try {

            $this->bbdd->beginTransaction();
            $sqlMaxNum = "SELECT max(ID_Producto)+1 AS maxIdProducto FROM productos";
            $resultado = $this->bbdd->query($sqlMaxNum);
            $numero = $resultado->fetch(PDO::FETCH_ASSOC)["maxIdProducto"];
            $this->bbdd->commit();
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una excepci??n:" . $exception->getMessage();
        }
        return $numero;
    }


    /* FILTRADO Jaume */

    private function setCurrentFilter()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        if (isset($_POST["filter"])) {
            $this->filter = $_POST["filter"];
        } else {
            $this->filter = "%%";
        }
    }
    public function getFilter()
    {
        return $this->filter;
    }
}
