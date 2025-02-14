<?php
require_once "conexion.php";

class ModelProducto
{
    private $conexion;

    public function __construct()
    {
        $db = new Conexion();
        $this->conexion = $db->getConexion();
    }

    public function listarProductos()
    {
        $query = "SELECT * FROM productos";
        $resultado = $this->conexion->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function insertarProducto($nombre, $precio)
    {
        $query = "INSERT INTO productos (nombreProducto, precio) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sd", $nombre, $precio);
        $stmt->execute();
        $stmt->close();
    }

    public function eliminarProducto($id)
    {
        $query = "DELETE FROM productos WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function actualizarProducto($id, $nombre, $precio)
    {
        $query = "UPDATE productos SET nombreProducto = ?, precio = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sdi", $nombre, $precio, $id);
        $stmt->execute();
        $stmt->close();
    }
}
