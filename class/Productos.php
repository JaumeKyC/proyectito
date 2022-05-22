<?php

class Productos
{
    protected $idProducto;
    protected $nombre;
    protected $proveedor;
    protected $descripcion;
    protected $cantidadStock;
    protected $precioVenta;
    protected $precioProveedor;

    public function __construct($idProducto, $nombre, $proveedor, $descripcion, $cantidadStock, $precioVenta, $precioProveedor)
    {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->proveedor = $proveedor;
        $this->descripcion = $descripcion;
        $this->cantidadStock = $cantidadStock;
        $this->precioVenta = $precioVenta;
        $this->precioProveedor = $precioProveedor;
    }

    


    public function getIdProducto()
    {
        return $this->idProducto;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function getProveedor()
    {
        return $this->proveedor;
    }

 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

 
    public function getCantidadStock()
    {
        return $this->cantidadStock;
    }

 
    public function getPrecioVenta()
    {
        return $this->precioVenta;
    }


    public function getPrecioProveedor()
    {
        return $this->precioProveedor;
    }
}
