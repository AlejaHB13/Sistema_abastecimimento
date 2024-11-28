<?php
// Incluir el archivo Facade para obtener los pedidos
include_once '../controller/Facade.php';
$facade = new Facade();

// Obtener todas las cotizaciones
$cotizaciones = $facade->obtenerCotizaciones();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Director de compras</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Validación de cotizaciones</h1>
        <a href="login.php" class="logout-btn">Cerrar sesión</a>
    </header>

    <div class="cotizacion-form">
        <h2>Registrar cotización:</h2>
        <form action="../controller/DirectorController.php" method="POST">
            <div class="form-group">
                <input type="text" name="proveedor" placeholder="Proveedor" required>
            </div>
            <div class="form-group">
                <input type="number" name="valor" placeholder="Valor" required>
            </div>
            <div class="form-group">
                <input type="text" name="informacion" placeholder="Información" required>
            </div>
            <button type="submit" class="btn">Registrar cotización</button>
        </form>
    </div>

    <div class="cotizacion-list">
        <h2>Listado de cotizaciones</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Proveedor</th>
                    <th>Valor</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cotizaciones as $cotizacion): ?>
                <tr>
                    <td><?php echo $cotizacion['id']; ?></td>
                    <td><?php echo $cotizacion['proveedor']; ?></td>
                    <td><?php echo '$' . number_format($cotizacion['valor'], 2); ?></td>
                    <td class="<?php echo strtolower($cotizacion['estado']); ?>"><?php echo $cotizacion['estado']; ?></td>
                    <td>
                    <button onclick="openModal(<?php echo $cotizacion['id']; ?>, '<?php echo $cotizacion['proveedor']; ?>', <?php echo $cotizacion['valor']; ?>, '<?php echo $cotizacion['informacion']; ?>')" class="btn">Editar</button>
                        <a href="../controller/eliminarCotizacion.php?id=<?php echo $cotizacion['id']; ?>" class="btn-eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar esta cotización?');">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal para edición -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Editar Cotización</h2>
            <form id="editForm" action="../controller/EditarCotizacion.php" method="POST">
                <input type="hidden" name="id" id="cotizacionId">
                <div class="form-group">
                    <label for="proveedor">Proveedor:</label>
                    <input type="text" name="proveedor" id="proveedor" required>
                </div>
                <div class="form-group">
                    <label for="valor">Valor:</label>
                    <input type="number" name="valor" id="valor" required>
                </div>
                <div class="form-group">
                    <label for="informacion">Información:</label>
                    <input type="text" name="informacion" id="informacion" required>
                </div>
                <button type="submit" class="btn">Guardar cambios</button>
            </form>
        </div>
    </div>

    <script>
        // Función para abrir el modal con los datos de la cotización seleccionada
        function openModal(id, proveedor, valor, informacion) {
            document.getElementById('cotizacionId').value = id;
            document.getElementById('proveedor').value = proveedor;
            document.getElementById('valor').value = valor;
            document.getElementById('informacion').value = informacion;
            document.getElementById('editModal').style.display = 'block';
        }

        // Función para cerrar el modal
        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>
</body>
</html>
