<?php

class Pedidos
{
    protected $idPedido;
    protected $idCliente;
    protected $fechaPedido;
    protected $fechaEsperada;
    protected $fechaEntrega;
    protected $estado;
    protected $importe;

    public function __construct($idPedido, $idCliente, $fechaPedido, $fechaEsperada, $fechaEntrega, $estado, $importe)
    {
        $this->idPedido = $idPedido;
        $this->idCliente = $idCliente;
        $this->fechaPedido = $fechaPedido;
        $this->fechaEsperada = $fechaEsperada;
        $this->fechaEntrega = $fechaEntrega;
        $this->estado = $estado;
        $this->importe = $importe;
    }

    /**
     * Get the value of idPedido
     */ 
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * Get the value of idCliente
     */ 
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Get the value of fechaPedido
     */ 
    public function getFechaPedido()
    {
        return $this->fechaPedido;
    }

    /**
     * Get the value of fechaEsperada
     */ 
    public function getFechaEsperada()
    {
        return $this->fechaEsperada;
    }

    /**
     * Get the value of fechaEntrega
     */ 
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Get the value of importe
     */ 
    public function getImporte()
    {
        return $this->importe;
    }
}
