<?php
session_start();
include 'config.php';
include 'templates/header.php';

$sql = "SELECT * FROM eventos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Eventos</title>
  <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <div class="container mx-auto px-4 py-8">
    <h2>Lista de Eventos</h2>
    <table class="table-auto w-full">
      <thead>
        <tr class="bg-gray-100 text-gray-600 text-sm font-medium">
          <th class="px-6 py-3">Título</th>
          <th class="px-6 py-3">Descripción</th>
          <th class="px-6 py-3">Fecha</th>
          <th class="px-6 py-3">Hora</th>
          <th class="px-6 py-3">Lugar</th>
          <th class="px-6 py-3">Capacidad</th>
          <th class="px-6 py-3">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr class="border-b hover:bg-gray-100">
            <td class="px-6 py-4"><?php echo $row['titulo']; ?></td>
            <td class="px-6 py-4"><?php echo $row['descripcion']; ?></td>
            <td class="px-6 py-4"><?php echo $row['fecha']; ?></td>
            <td class="px-6 py-4"><?php echo $row['hora']; ?></td>
            <td class="px-6 py-4"><?php echo $row['lugar']; ?></td>
            <td class="px-6 py-4"><?php echo $row['capacidad']; ?></td>
            <td class="px-6 py-4 text-center">
              <a href="registrar_evento.php?id=<?php echo $row['id']; ?>" class="px-2 py-1 text-blue-600 font-bold rounded hover:bg-blue-100">Registrarse</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
