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

    

    /**
     * Get the value of idProducto
     */ 
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of proveedor
     */ 
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Get the value of cantidadStock
     */ 
    public function getCantidadStock()
    {
        return $this->cantidadStock;
    }

    /**
     * Get the value of precioVenta
     */ 
    public function getPrecioVenta()
    {
        return $this->precioVenta;
    }

    /**
     * Get the value of precioProveedor
     */ 
    public function getPrecioProveedor()
    {
        return $this->precioProveedor;
    }
}
