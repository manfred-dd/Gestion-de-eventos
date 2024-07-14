<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Bienvenido a tu panel de control, usuario ID: " . $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <a href="logout.php"><button>Cerrar Sesión</button></a>
    </div>
</body>
</html>
