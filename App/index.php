<?php
require '../Controlador/Controller_Producto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['agregar'])) {
        $controller->agregarProducto($_POST['nombreProducto'], $_POST['precio']);
    } elseif (isset($_POST['eliminar'])) {
        $controller->eliminarProducto($_POST['id']);
    } elseif (isset($_POST['actualizar'])) {
        $controller->actualizarProducto($_POST['id'], $_POST['nombreProducto'], $_POST['precio']);
    }
}

$productos = $controller->listarProductos();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
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

        table {
            width: 50%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 4px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f6f7f6;
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
            color: black;
            outline: none;
            font-weight: 600;
        }

        a {
            text-decoration: none;
            color: black;
            font-size: 12px;
            outline: none;
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 10px 5px;
            background-color: #F0F0F0;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <h1>Gestión de Productos</h1>

    <h2>Agregar Nuevo Producto</h2>
    <form method="post">
        <input type="text" name="nombreProducto" placeholder="Nombre del producto" required>
        <input type="number" name="precio" placeholder="Precio" step="0.01" required>
        <button type="submit" name="agregar">Agregar Producto</button>
    </form>

    <h2>Lista de Productos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= htmlspecialchars($producto['id']) ?></td>
                    <td><?= htmlspecialchars($producto['nombreProducto']) ?></td>
                    <td><?= htmlspecialchars($producto['precio']) ?></td>
                    <td>
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                            <button type="submit" name="eliminar">Eliminar</button>
                        </form>
                    <td>
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                            <a href="edit.php?id=<?= $producto['id'] ?>">Editar</a>
                        </form>
                    </td>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>