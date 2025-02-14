<?php
class Conexion
{
    private $host = "localhost";
    private $usuario = "root";
    private $password = "";
    private $base_datos = "tienda";
    public $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->base_datos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function getConexion()
    {
        return $this->conexion;
    }
}
