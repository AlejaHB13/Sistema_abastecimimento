<?php
// Incluir el archivo Facade para obtener los pedidos
include_once '../controller/Facade.php';
$facade = new Facade();

// Obtener todos los pedidos
$pedidos = $facade->obtenerPedidos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesero</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Registro de pedido</h1>
        <a href="login.php" class="logout-btn">Cerrar Sesión</a>
    </header>

    <div class="container">
        <!-- Sección de registro de pedido -->
        <div class="form-section">
            <form action="../controller/MeseroController.php" method="POST">
                <label for="plato">Platos:</label>
                <select name="plato" id="plato" required>
                    <option value="Pasta a la boloñesa">Pasta a la boloñesa</option>
                    <option value="Pechuga gratinada">Pechuga gratinada</option>
                    <option value="Sopa de tomate">Sopa de tomate</option>
                </select>

                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" value="1" min="1" required>

                <label for="mesa">Mesa:</label>
                <input type="number" name="mesa" id="mesa" placeholder="Mesa" required>

                <button type="submit" class="btn">Registrar pedido</button>
            </form>
        </div>

        <!-- Sección de listado de pedidos -->
        <div class="pedidos-section">
            <h2>Pedidos registrados</h2>
            <div class="pedidos-container">
                <?php
                // Definir $pedidos como array vacío si no está definido
                if (!isset($pedidos)) {
                    $pedidos = [];
                }

                // Comprobar si hay pedidos
                if (count($pedidos) > 0):
                    foreach ($pedidos as $pedido):
                ?>
                <div class="pedido-card">
                    <h3>Pedido #<?php echo $pedido['id']; ?></h3>
                    <p><strong>Mesa:</strong> <?php echo $pedido['mesa']; ?></p>
                    <p><strong>Plato:</strong> <?php echo $pedido['plato']; ?></p>
                    <p><strong>Cantidad:</strong> <?php echo $pedido['cantidad']; ?></p>
                    <!-- Botón para eliminar el pedido -->
                    <a href="../controller/EliminarPedidoController.php?id=<?php echo $pedido['id']; ?>" class="delete-btn " onclick="return confirm('¿Estás seguro de que deseas eliminar este pedido?');">Eliminar</a>
                </div>
                <?php
                    endforeach;
                else:
                ?>
                <p>No hay pedidos registrados.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
