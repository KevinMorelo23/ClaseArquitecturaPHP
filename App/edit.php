<?php
require '../Controlador/Controller_Producto.php';

if (!isset($_GET['id'])) {
    die("Error: No se proporcionó un ID válido.");
}

$id = $_GET['id'];
$productos = $controller->listarProductos();
$producto = null;

foreach ($productos as $p) {
    if ($p['id'] == $id) {
        $producto = $p;
        break;
    }
}

if (!$producto) {
    die("Error: Producto no encontrado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->actualizarProducto($id, $_POST['nombreProducto'], $_POST['precio']);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
</head>
<style>
    body {
        font-family: system-ui;
        margin: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #f1f8fe;
        font-size: 12px;
    }

    input {
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        color: #555;
        outline: none;

    }

    button {
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
        font-size: 12px;
        color: #555;
        outline: none;
    }
</style>

<body>
    <h1>Editar Producto</h1>
    <form method="post">
        <label>Nombre:</label>
        <input type="text" name="nombreProducto" value="<?= htmlspecialchars($producto['nombreProducto']) ?>" required>
        <label>Precio:</label>
        <input type="number" name="precio" value="<?= htmlspecialchars($producto['precio']) ?>" step="0.01" required>
        <button type="submit">Guardar Cambios</button>
    </form>
    <br>
    <a href="index.php">Volver</a>
</body>

</html>