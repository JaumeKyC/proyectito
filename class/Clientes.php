<?php

class Clientes extends Connection
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


        $this->connect();
    }

    public function nuevoCliente($cliente) //cliente será $_POST
    {

        try {

            $this->bbdd->beginTransaction();

            $stmt = $this->bbdd->prepare("INSERT INTO Clientes VALUES (:ID, :Empresa, :NombreContacto, :ApellidoContacto, :Email, :Telefono, :DireccionCalle, :DireccionNumero, :Ciudad, :Comunidad, :Pais, :CodPostal)");

            $stmt->bindParam(':ID', $cliente["ID"], PDO::PARAM_INT);
            $stmt->bindParam(':Nombre', $cliente["Empresa"], PDO::PARAM_STR);
            $stmt->bindParam(':NombreContacto', $cliente["NombreContacto"], PDO::PARAM_STR);
            $stmt->bindParam(':ApellidoContacto', $cliente["ApellidoContacto"], PDO::PARAM_STR);
            $stmt->bindParam(':Email', $cliente["Email"], PDO::PARAM_STR);
            $stmt->bindParam(':Telefono', $cliente["Telefono"], PDO::PARAM_STR);
            $stmt->bindParam(':DireccionCalle', $cliente["DireccionCalle"], PDO::PARAM_STR);
            $stmt->bindParam(':DireccionNumero', $cliente["DireccionNumero"], PDO::PARAM_STR);
            $stmt->bindParam(':Ciudad', $cliente["Ciudad"], PDO::PARAM_STR);
            $stmt->bindParam(':Comunidad', $cliente["Comunidad"], PDO::PARAM_STR);
            $stmt->bindParam(':Pais', $cliente["Pais"], PDO::PARAM_STR);
            $stmt->bindParam(':CodPostal', $cliente["CodPostal"], PDO::PARAM_STR);

            $stmt->execute(); //Ejecuta

            $this->bbdd->commit();
        } catch (PDOException $exception) {
            echo "<br> Se ha producido una ex excepción:" . $exception->getMessage();
        } finally {
            //Cerramos la conexión
            $this->bbdd = null;
        }
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of nombreContacto
     */ 
    public function getNombreContacto()
    {
        return $this->nombreContacto;
    }

    /**
     * Get the value of apellidoContacto
     */ 
    public function getApellidoContacto()
    {
        return $this->apellidoContacto;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Get the value of direccionCalle
     */ 
    public function getDireccionCalle()
    {
        return $this->direccionCalle;
    }

    /**
     * Get the value of direccionNumero
     */ 
    public function getDireccionNumero()
    {
        return $this->direccionNumero;
    }

    /**
     * Get the value of ciudad
     */ 
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Get the value of comunidad
     */ 
    public function getComunidad()
    {
        return $this->comunidad;
    }

    /**
     * Get the value of pais
     */ 
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Get the value of codPostal
     */ 
    public function getCodPostal()
    {
        return $this->codPostal;
    }
}
