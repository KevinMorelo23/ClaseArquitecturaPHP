<?php
require_once "../Model/Model_producto.php";

class ControllerProducto
{
    private $model;

    public function __construct()
    {
        $this->model = new ModelProducto();
    }

    public function listarProductos()
    {
        return $this->model->listarProductos();
    }

    public function agregarProducto($nombre, $precio)
    {
        $this->model->insertarProducto($nombre, $precio);
        header("Location: ../App/index.php");
    }

    public function eliminarProducto($id)
    {
        $this->model->eliminarProducto($id);
        header("Location: ../App/index.php");
    }

    public function actualizarProducto($id, $nombre, $precio)
    {
        $this->model->actualizarProducto($id, $nombre, $precio);
        header("Location: ../App/index.php");
    }
}

$controller = new ControllerProducto();
