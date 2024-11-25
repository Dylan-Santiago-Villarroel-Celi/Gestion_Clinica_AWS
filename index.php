<?php

require 'conexion.php';



// Consultas SQL para obtener un paciente, un doctor, un consultorio y una consulta
$paciente = $conn->query("SELECT * FROM pacientes LIMIT 1")->fetch_assoc();
$doctor = $conn->query("SELECT * FROM doctores LIMIT 1")->fetch_assoc();
$consultorio = $conn->query("SELECT * FROM consultorios LIMIT 1")->fetch_assoc();
$consulta = $conn->query("SELECT * FROM consultas LIMIT 1")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clínica - Resumen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        header, footer {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .card h3 {
            margin: 0 0 10px;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <h1>Clínica - Resumen de Información</h1>
    </header>

    <!-- Contenido -->
    <div class="container">
    <!-- Paciente -->
    <div class="card">
        <h3>Paciente</h3>
        <p><strong>Nombre:</strong> <?php echo $paciente['nombre']; ?></p>
        <p><strong>Género:</strong> <?php echo $paciente['genero']; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $paciente['telefono']; ?></p>
        <a href="crud_pacientes.php"><button style="padding: 10px 20px; font-size: 16px;">Gestionar Pacientes</button></a>
    </div>

    <!-- Doctor -->
    <div class="card">
        <h3>Doctor</h3>
        <p><strong>Nombre:</strong> <?php echo $doctor['nombre']; ?></p>
        <p><strong>Especialidad:</strong> <?php echo $doctor['especialidad']; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $doctor['telefono']; ?></p>
        <a href="crud_doctores.php"><button style="padding: 10px 20px; font-size: 16px;">Gestionar Doctores</button></a>
    </div>

    <!-- Consultorio -->
    <div class="card">
        <h3>Consultorio</h3>
        <p><strong>Nombre:</strong> <?php echo $consultorio['nombre']; ?></p>
        <a href="crud_consultorios.php"><button style="padding: 10px 20px; font-size: 16px;">Gestionar Consultorios</button></a>
    </div>

    <!-- Consulta -->
    <div class="card">
        <h3>Consulta</h3>
        <p><strong>Fecha:</strong> <?php echo $consulta['fecha']; ?></p>
        <p><strong>Motivo:</strong> <?php echo $consulta['motivo']; ?></p>
        <p><strong>Diagnóstico:</strong> <?php echo $consulta['diagnostico']; ?></p>
        <a href="crud_consultas.php"><button style="padding: 10px 20px; font-size: 16px;">Gestionar Consultas</button></a>
    </div>
</div>
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Clínica - Todos los derechos reservados.</p>
    </footer>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
