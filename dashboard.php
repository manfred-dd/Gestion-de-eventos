<?php
session_start();
include 'templates/header.php';

// Redirigir al usuario si no ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css"> </head>
<body>
  <div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center">
      <h2 class="text-2xl font-bold text-gray-800">Bienvenido a tu panel de control</h2>
      <a href="logout.php">
        <button class="px-4 py-2 bg-red-500 text-white font-bold rounded hover:bg-red-700">Cerrar Sesión</button>
      </a>
    </div>
    <p class="text-gray-600 mt-4">Usuario ID: <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
  </div>
</body>
</html>

