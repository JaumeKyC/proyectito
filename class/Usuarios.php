<?php
//Diego
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



    public function getNombre()
    {
        return $this->nombre;
    }


    public function getUsuario()
    {
        return $this->usuario;
    }


    public function getContraseña()
    {
        return $this->contraseña;
    }


    public function getId()
    {
        return $this->id;
    }


    public function getIsAdmin()
    {
        return $this->isAdmin;
    }
}