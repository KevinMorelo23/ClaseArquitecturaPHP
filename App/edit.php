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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
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
        border-radius: 10px;
        font-size: 14px;
        color: #555;
        outline: none;

    }

    button {
        padding: 10px;
        border: none;
        border-radius: 5px;
        font-size: 12px;
        color: white;
        outline: none;
        font-weight: 600;
        background-color: #363636;
        cursor: pointer;
    }

    button:hover {
        background-color: #999999;
        color: black;
    }

    .nombre {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .precio {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        gap: 10px;

    }


    label {
        font-size: 12px;
        font-weight: 600;
    }

    a {
        text-decoration: none;
        color: black;
        font-weight: 600;
    }
</style>

<body>
    <h1>Editar Producto</h1>
    <form method="post">
        <div class="nombre">
            <label>Nombre:</label>
            <input type="text" name="nombreProducto" value="<?= htmlspecialchars($producto['nombreProducto']) ?>" required>
        </div>
        <div class="precio">
            <label>Precio:</label>
            <input type="number" name="precio" value="<?= htmlspecialchars($producto['precio']) ?>" step="0.01" required>
        </div>
        <button type="submit">Guardar Cambios</button>
    </form>
    <br>
    <a href="index.php">Volver</a>
</body>

</html>