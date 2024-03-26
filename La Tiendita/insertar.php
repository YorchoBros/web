<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Registro</title>
</head>
<body>
    <h2>Insertar Registro</h2>
    <form action="insertar.php" method="post">
        Nombre: <input type="text" name="nombre"><br>
        Email: <input type="email" name="email"><br>
        <!-- Otros campos aquí -->
        <input type="submit" value="Insertar">
    </form>

    <?php
    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conectar a la base de datos (reemplaza los valores con los de tu conexión)
        $conexion = new mysqli("localhost", "usuario", "contraseña", "basededatos");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }

        // Obtener los datos del formulario
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        // Otros campos aquí

        // Preparar la consulta SQL para insertar el registro
        $sql = "INSERT INTO tabla (nombre, email) VALUES ('$nombre', '$email')"; // Modifica la consulta según tu estructura de tabla

        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "Registro insertado correctamente";
        } else {
            echo "Error al insertar el registro: " . $conexion->error;
        }

        // Cerrar la conexión
        $conexion->close();
    }
    ?>
</body>
</html>