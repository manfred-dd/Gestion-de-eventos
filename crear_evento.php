<?php
session_start();
include 'config.php';
include 'templates/header.php';
if (!isset($_SESSION['user_id']) || $_SESSION['rol'] != 'organizador') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $lugar = $_POST['lugar'];
    $capacidad = $_POST['capacidad'];
    $organizador_id = $_SESSION['user_id'];

    $sql = "INSERT INTO eventos (titulo, descripcion, fecha, hora, lugar, capacidad, organizador_id) 
            VALUES ('$titulo', '$descripcion', '$fecha', '$hora', '$lugar', '$capacidad', '$organizador_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Evento creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Evento</title>
  <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container mx-auto px-4 py-8">
    <h2>Crear Evento</h2>
    <form method="POST" action="" class="space-y-4">
      <div class="flex flex-col">
        <label for="titulo" class="text-sm font-medium mb-2">Título:</label>
        <input type="text" name="titulo" id="titulo" placeholder="Ingrese el título del evento" required class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:ring-1">
      </div>
      <div class="flex flex-col">
        <label for="descripcion" class="text-sm font-medium mb-2">Descripción:</label>
        <textarea name="descripcion" id="descripcion" placeholder="Ingrese una descripción detallada del evento" required class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:ring-1 h-24"></textarea>
      </div>
      <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div class="flex flex-col">
          <label for="fecha" class="text-sm font-medium mb-2">Fecha:</label>
          <input type="date" name="fecha" id="fecha" required class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:ring-1">
        </div>
        <div class="flex flex-col">
          <label for="hora" class="text-sm font-medium mb-2">Hora:</label>
          <input type="time" name="hora" id="hora" required class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:ring-1">
        </div>
      </div>
      <div class="flex flex-col">
        <label for="lugar" class="text-sm font-medium mb-2">Lugar:</label>
        <input type="text" name="lugar" id="lugar" placeholder="Ingrese el lugar del evento" required class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:ring-1">
      </div>
      <div class="flex flex-col">
        <label for="capacidad" class="text-sm font-medium mb-2">Capacidad Máxima:</label>
        <input type="number" name="capacidad" id="capacidad" placeholder="Ingrese la capacidad máxima de asistentes" required class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:ring-1">
      </div>
      <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-bold rounded hover:bg-blue-700">Crear Evento</button>
    </form>
  </div>
</body>
</html>



