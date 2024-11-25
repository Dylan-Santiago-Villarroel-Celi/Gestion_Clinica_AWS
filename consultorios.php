<?php
// Conexión a la base de datos
require 'conexion.php';

// Manejo de acciones CRUD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear nuevo consultorio
    if (isset($_POST['crear'])) {
        $nombre = $_POST['nombre'];

        $sql = "INSERT INTO consultorios (nombre) VALUES ('$nombre')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Consultorio creado exitosamente.</p>";
        } else {
            echo "<p>Error al crear consultorio: " . $conn->error . "</p>";
        }
    }

    // Actualizar consultorio
    if (isset($_POST['actualizar'])) {
        $id_consultorio = $_POST['id_consultorio'];
        $nombre = $_POST['nombre'];

        $sql = "UPDATE consultorios SET nombre = '$nombre' WHERE id_consultorio = '$id_consultorio'";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Consultorio actualizado exitosamente.</p>";
        } else {
            echo "<p>Error al actualizar consultorio: " . $conn->error . "</p>";
        }
    }

    // Eliminar consultorio
    if (isset($_POST['eliminar'])) {
        $id_consultorio = $_POST['id_consultorio'];

        $sql = "DELETE FROM consultorios WHERE id_consultorio = '$id_consultorio'";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Consultorio eliminado exitosamente.</p>";
        } else {
            echo "<p>Error al eliminar consultorio: " . $conn->error . "</p>";
        }
    }
}

// Leer todos los consultorios
$consultorios = $conn->query("SELECT * FROM consultorios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Consultorios</title>
    <style>
        nav {
            background-color: #0056b3; /* Fondo azul oscuro */
            padding: 10px 0;
        }
        nav ul {
            list-style: none; /* Elimina las viñetas */
            margin: 0;
            padding: 0;
            display: flex; /* Muestra los elementos en una fila horizontal */
            justify-content: center; /* Centra los elementos en el menú */
            gap: 20px; /* Espaciado entre las opciones */
        }
        nav ul li {
            margin: 0; /* Asegura que no haya márgenes adicionales */
        }
        nav ul li a {
            color: white; /* Texto blanco */
            text-decoration: none; /* Elimina el subrayado de los enlaces */
            font-size: 16px; /* Tamaño de letra */
            font-weight: bold; /* Texto en negrita */
            padding: 10px 20px; /* Espaciado interno */
            border-radius: 4px; /* Bordes ligeramente redondeados */
            transition: background-color 0.3s ease, transform 0.2s ease; /* Animación suave */
        }
        nav ul li a:hover {
            background-color: #003f8a; /* Cambia el fondo al pasar el cursor */
            transform: scale(1.1); /* Amplía ligeramente el botón al pasar el cursor */
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .form-container form {
            display: flex;
            flex-direction: column;
        }
        .form-container input, .form-container button {
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h1>Gestión de Consultorios</h1>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="consultas.php">Consultas</a></li>
                <li><a href="doctores.php">Doctores</a></li>
                <li><a href="pacientes.php">Pacientes</a></li>
                <li><a href="consultorios.php">Consultorios</a></li>
            </ul>
        </nav>
    </header>
    <!-- Mostrar consultorios -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = $consultorios->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $fila['id_consultorio']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="id_consultorio" value="<?php echo $fila['id_consultorio']; ?>">
                            <button type="submit" name="eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Formulario para Crear/Actualizar consultorio -->
    <div class="form-container">
        <form method="POST">
            <input type="hidden" name="id_consultorio">
            <input type="text" name="nombre" placeholder="Nombre del Consultorio" required>
            <button type="submit" name="crear">Crear</button>
            <button type="submit" name="actualizar">Actualizar</button>
        </form>
    </div>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
