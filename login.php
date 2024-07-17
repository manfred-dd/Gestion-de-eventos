<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['rol'] = $user['rol'];
            header("Location: inicio.php");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "No se encontró el usuario";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión</title>
  <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mx-auto px-4 py-8 flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded shadow-md">
      <h2 class="text-2xl font-bold text-center mb-4">Iniciar Sesión</h2>
      <form method="POST" action="" class="space-y-4">
        <div class="flex flex-col">
          <label for="email" class="text-sm font-medium mb-2">Email:</label>
          <input type="email" name="email" id="email" placeholder="Ingrese su email" required class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:ring-1">
        </div>
        <div class="flex flex-col">
          <label for="password" class="text-sm font-medium mb-2">Contraseña:</label>
          <input type="password" name="password" id="password" placeholder="Ingrese su contraseña" required class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:ring-1">
        </div>
        <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-bold rounded hover:bg-blue-700">Iniciar Sesión</button>
      </form>
    </div>
  </div>
</body>
</html>