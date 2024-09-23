<?php

session_start(); // Creamos una nueva sesión o reanudamos una existente

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica si el formulario fue enviado mediante el método POST
    $user = $_POST['user'];
    $password = $_POST['password'];

    if ($user === 'nombre@cesun.edu.mx' && $password === '12345') { // Verificación de que los datos son correctos
        $_SESSION['loggedin'] = true; // Almacena la variable de sesión que indica que el usuario inició sesión correctamente
        header('Location: ./taskmanager1.php'); // Redirecciona al archivo taskmanager1.php
        exit; // Termina la ejecución del script actual
    } else {
        $error = "Usuario o contraseña inválidos"; // Mensaje de error si la verificación falla
    }

} else {
    $error = "No se obtuvieron datos"; // Mensaje de error si no hay datos
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/login.css"> <!-- Asegúrate de que la ruta del archivo CSS sea correcta -->
</head>
<body>
    <main>
        <div class="login-flex"> <!-- Corregido: agregar 'div' aquí -->
            <h1>Login</h1>
            <!-- Mostrar el mensaje de error si existe -->
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <!-- Formulario de inicio de sesión -->
            <form method="POST" action="login.php">
                <div>
                    <label for="user">Username</label>
                    <br>
                    <input id="user" name="user" type="text" required> <!-- Agregar atributo 'name' y 'required' -->
                </div>
                <div>
                    <label for="password">Password</label>
                    <br>
                    <input id="password" name="password" type="password" required> <!-- Cambiar a 'password' y agregar 'name' -->
                </div>
                <br>
                <button type="submit" class="login-btn">Login</button> <!-- Cambiar 'button' fuera del form a un tipo 'submit' -->
            </form>
        </div>
    </main>
</body>
</html>
