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
            echo 'Falló la inserción: ' . $e->getMessage();
        }
    }
    public function getAllClientes() //Devuelve un array de objetos con todos los clientes
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
            echo "<br> Se ha producido una ex excepción:" . $exception->getMessage();
        }
    }

    public function drawClientesList($admin) //Crea la tabla a partir del array de objetos clientes
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

    public function getCliente($id) //Devuelve la info de un solo cliente al pasarle el ID
    {
        try {
            $stmtClient = $this->bbdd->prepare("SELECT * FROM clientes WHERE id = :id");
            $stmtClient->bindParam(':id', $id, PDO::PARAM_STR);
            if ($stmtClient->execute() && $stmtClient->rowCount() > 0) {
                return $stmtClient->fetch(PDO::FETCH_ASSOC);
            }
        } catch (Exception | PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
        return new Clientes(null, null, null, null, null, null, null, null, null, null, null, null);
    }

    public function drawClienteInfo($id) //Crea la tabla de información del cliente
    {
        $cliente = $this->getCliente($id);
        $output = "";
        $output .= "<thead><tr><th colspan='8'>Detalles de " . $cliente->getNombre() . "</th></tr></thead>";
        $output .= "<tbody><tr><th colspan='2'>Nombre del Contacto</th><th colspan='2'>Apellido del Conctacto</th><th colspan='2'>Teléfono</th><th colspan='2'>Email</th></tr>";
        $output .= "<tr><td colspan='2'>" . $cliente->getNombreContacto() . "</td><td colspan='2'>" . $cliente->getApellidoContacto() . "</td><td colspan='2'>" . $cliente->getTelefono() . "</td><td colspan='2'>" . $cliente->getEmail() . "</td></tr>";
        $output .= "<tr><th colspan='2''>Calle</th><th>Número</th><th>Ciudad</th><th>Comunidad</th><th>País</th><th>Código Postal</th></tr>";
        $output .= "<tr><td colspan='2'>" . $cliente->getDireccionCalle() . "</td><td>" . $cliente->getDireccionNumero() . "</td><td>" . $cliente->getCiudad() . "</td><td>" . $cliente->getComunidad() . "</td><td>" . $cliente->getPais() . "</td><td>" . $cliente->getCodPostal() . "</td></tr></tbody>";
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
            echo 'Falló la inserción: ' . $e->getMessage();
        }
    }

    //PEDIDOS
    public function getAllPedidos() //Devuelve un array de objetos con todos los pedidos
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
            echo "<br> Se ha producido una ex excepción:" . $exception->getMessage();
        }
    }

    public function drawPedidosList($admin) //Crea la tabla a partir del array de objetos pedido
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
            $output .= "<td>" . $pedidos->getImporte() . "</td>";
            $output .= "<td> <a href='info.php?id=" . $pedidos->getIdPedido() . "'><img src='../img/info.png' width='25'></a> </td>";
            $output .= "<td> <a class=" . $disabled . " href='edit.php?id=" . $pedidos->getIdPedido() . "'><img src='../img/write.png' width='25'></a> </td>";
            $output .= "<td> <a class=" . $disabled . " href='deletePedidos.php?id=" . $pedidos->getIdPedido() . "'><img src='../img/borrar.png' width='25'></a> </td>";
            $output .= "</tr>";
        }
        return $output;
    }

    public function deletePedidos($id)
    {
        try {
            $stmtDelete = $this->bbdd->prepare("DELETE FROM pedidos WHERE ID_Pedidos = :id");
            $stmtDelete->bindParam(':id', $id, PDO::PARAM_STR);
            $stmtDelete->execute();
            return $stmtDelete->rowCount();
        } catch (Exception | PDOException $e) {
            echo 'Falló la consulta: ' . $e->getMessage();
        }
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
    
    public function getInsertDetalle($post){ //REVISAR
        try {
        
            $idP = $post["producto"];
            $stmt = $this->bbdd->query("SELECT PrecioVenta AS precioVenta FROM productos WHERE ID_Producto = $idP");
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC)["precioVenta"]; //Resultado tiene precio unidad.
            $idpedido = $post["idpedido"];
            $idproducto = $post["producto"];
            $cantidad = $post["cantidad"];
            $preciounidad = $resultado;
            

            $stmtInsert = $this->bbdd->prepare("INSERT INTO detallepedido VALUES (:idpedido,:producto,:cantidad,:precioventa)");
            $stmtInsert->bindParam(':idpedido', $idpedido, PDO::PARAM_INT);
            $stmtInsert->bindParam(':producto', $idproducto, PDO::PARAM_STR);
            $stmtInsert->bindParam(':cantidad', $cantidad, PDO::PARAM_STR);
            $stmtInsert->bindParam(':precioventa', $preciounidad, PDO::PARAM_STR);
            

            $stmtInsert->execute();
            return $stmtInsert->rowCount();
            
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una excepción:" . $exception->getMessage();
        }

    }

    public function getPedidosProducto($id) //Te devuelve los productos de un pedido
    {
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT Nombre, Cantidad FROM detallepedido INNER JOIN productos ON detallepedido.ID_Producto = productos.ID_Producto WHERE detallepedido.ID_Pedido = $id");
            $stmt->execute();
            $output = "";
            $output .= "<ul>";
            while ($detalleP = $stmt->fetch(PDO::FETCH_ASSOC)) {
                
                $output .= "<li>" .$detalleP['Cantidad']."x ". $detalleP['Nombre'] . "</li> <br>";
              
            }
            $output .= "</ul>";
            $this->bbdd->commit();
            return $output;
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una excepción:" . $exception->getMessage();
        }
    }

    public function getImporteUnitario($id){
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT PrecioVenta FROM productos WHERE ID_producto = $id");
            $stmt->execute();
            $output = "";
           /* 
            while ($detalleP = $stmt->fetch(PDO::FETCH_ASSOC)) {
                
                $output .= "<p>".$detalleP['PrecioVenta']."</pi> <br>";
              
            } */
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una excepción:" . $exception->getMessage();
        }
    }

    public function getImporteTotal($id){
        try {
            $this->bbdd->beginTransaction();
            $stmt = $this->bbdd->prepare("SELECT Importe FROM pedidos WHERE ID_Pedido = $id");
            $stmt->execute();
            $output = "";
            $importe = $stmt->fetch();
            $this->bbdd->commit();
            $output .= "<p> TOTAL: " .$importe[0]." € </p>";
            return $output;
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una excepción:" . $exception->getMessage();
        }
    }

    public function createPedido($post){
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
            echo 'Falló la inserción: ' . $e->getMessage();
        }
    }

    //PRODUCTOS
    public function getAllProductos() //Devuelve un array de objetos con todos los productos
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

    public function drawProductosList($admin) //Crea la tabla a partir del array de objetos productos
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
            $output .= "<td>" . $productos->getPrecioVenta() . "</td>";
            $output .= "<td>" . $productos->getPrecioProveedor() . "</td>";
            $output .= "<td> <a href='info.php?id=" . $productos->getIdProducto() . "'><img src='../img/info.png' width='25'></a> </td>";
            $output .= "<td> <a class=" . $disabled . " href='edit.php?id=" . $productos->getIdProducto() . "'><img src='../img/write.png' width='25'></a> </td>";
            $output .= "<td> <a class=" . $disabled . " href='deleteProductos.php?id=" . $productos->getIdProducto() . "'><img src='../img/borrar.png' width='25'></a> </td>";
            $output .= "</tr>";
        }
        return $output;
    }

    //EXTRA
    public function alert($msg)
    {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }

    public function maxIDCliente()
    {
        try {
            //Crea un "punto de restauración" al que volver si todas las acciones no se completan correctamente.
            $this->bbdd->beginTransaction();
            $sqlMaxNum = "SELECT max(ID)+1 AS maxIdCliente FROM clientes";
            $resultado = $this->bbdd->query($sqlMaxNum);
            $numero = $resultado->fetch(PDO::FETCH_ASSOC)["maxIdCliente"];
            $this->bbdd->commit();
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una excepción:" . $exception->getMessage();
        }
        return $numero;
    }

    public function maxIDPedido()
    {
        try {
            //Crea un "punto de restauración" al que volver si todas las acciones no se completan correctamente.
            $this->bbdd->beginTransaction();
            $sqlMaxNum = "SELECT max(ID_pedido)+1 AS maxIdPedido FROM pedidos";
            $resultado = $this->bbdd->query($sqlMaxNum);
            $numero = $resultado->fetch(PDO::FETCH_ASSOC)["maxIdPedido"];
            $this->bbdd->commit();
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una excepción:" . $exception->getMessage();
        }
        return $numero;
    }

    /* FILTRADO */

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
