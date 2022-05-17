<?php

class Usuarios{
    protected $nombre;
    protected $usuario;
    protected $contraseña;
    protected $id;
    protected $isAdmin;

    public function __construct($nombre, $usuario, $contraseña, $id, $isAdmin)
    {
        $this->nombre = $nombre;
        $this->usuario = $usuario;
        $this->contraseña = $contraseña;
        $this->id = $id;
        $this->isAdmin = $isAdmin;
    }


    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of usuario
     */ 
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Get the value of contraseña
     */ 
    public function getContraseña()
    {
        return $this->contraseña;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of isAdmin
     */ 
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }
}