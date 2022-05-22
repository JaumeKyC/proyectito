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

   
    public function getIdPedido()
    {
        return $this->idPedido;
    }


    public function getIdCliente()
    {
        return $this->idCliente;
    }

   
    public function getFechaPedido()
    {
        return $this->fechaPedido;
    }

   
    public function getFechaEsperada()
    {
        return $this->fechaEsperada;
    }

  
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getImporte()
    {
        return $this->importe;
    }
}
