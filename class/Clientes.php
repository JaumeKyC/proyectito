<?php
//Diego
class Clientes
{
    protected $id;
    protected $nombre;
    protected $nombreContacto;
    protected $apellidoContacto;
    protected $email;
    protected $telefono;
    protected $direccionCalle;
    protected $direccionNumero;
    protected $ciudad;
    protected $comunidad;
    protected $pais;
    protected $codPostal;

    public function __construct($id, $nombre, $nombreContacto, $apellidoContacto, $email, $telefono, $direccionCalle, $direccionNumero, $ciudad, $comunidad, $pais, $codPostal )
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->nombreContacto = $nombreContacto;
        $this->apellidoContacto = $apellidoContacto;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->direccionCalle = $direccionCalle;
        $this->direccionNumero = $direccionNumero;
        $this->ciudad = $ciudad;
        $this->comunidad = $comunidad;
        $this->pais = $pais;
        $this->codPostal = $codPostal;

    }

    public function getId()
    {
        return $this->id;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function getNombreContacto()
    {
        return $this->nombreContacto;
    }

  
    public function getApellidoContacto()
    {
        return $this->apellidoContacto;
    }

  
    public function getEmail()
    {
        return $this->email;
    }


    public function getTelefono()
    {
        return $this->telefono;
    }

   
    public function getDireccionCalle()
    {
        return $this->direccionCalle;
    }

   
    public function getDireccionNumero()
    {
        return $this->direccionNumero;
    }

   
    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function getComunidad()
    {
        return $this->comunidad;
    }


    public function getPais()
    {
        return $this->pais;
    }

  
    public function getCodPostal()
    {
        return $this->codPostal;
    }
}
