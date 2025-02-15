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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Poppins", sans-serif;
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
            background-color: #fff;
            padding: 4px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f6f7f6;
        }

        input {
            padding: 8px;
            border-radius: 5px;
            border: 2px solid #ddd;
            color: black;
        }

        button {
            padding: 6px;
            border: none;
            border-radius: 5px;
            font-size: 12px;

            outline: none;
            font-weight: 600;
            background-color: #dfdfdf;
            color: #363636;
            cursor: pointer;
        }

        button:hover {
            background-color: #c8c8c8;
            color: #363636;

        }
    </style>
</head>

<body>
    <h1 class="titulo">Gestión de Productos</h1>

    <h2>Agregar Nuevo Producto</h2>
    <form method="post">
        <input type="text" name="nombreProducto" placeholder="Nombre del producto" required>
        <input type="number" name="precio" placeholder="Precio" step="0.01" required>
        <button type="submit" id="agregar" name="agregar">Agregar Producto</button>

    </form>

    <h2>Lista de Productos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>

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
                            <button class="eliminar" type="submit" name="eliminar" style="background-color: #fff0f0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ff5757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7l16 0" />
                                    <path d="M10 11l0 6" />
                                    <path d="M14 11l0 6" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                </svg>
                            </button>
                        </form>

                        <form method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= $producto['id'] ?>">
                            <a href="edit.php?id=<?= $producto['id'] ?>">
                                <button type="button" style="background-color: #fdffe7;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#fff80d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                        <path d="M13.5 6.5l4 4" />
                                    </svg>
                                </button>
                            </a>

                        </form>
                    </td>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>