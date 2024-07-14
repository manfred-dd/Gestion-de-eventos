<?php
session_start();
include 'config.php';
include 'templates/header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $foto_perfil = $_POST['foto_perfil'];

    $sql = "UPDATE usuarios SET nombre='$nombre', foto_perfil='$foto_perfil' WHERE id='$user_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Perfil actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM usuarios WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Editar Perfil</h2>
        <form method="POST" action="">
            <input type="text" name="nombre" value="<?php echo $user['nombre']; ?>" required>
            <input type="text" name="foto_perfil" value="<?php echo $user['foto_perfil']; ?>" placeholder="URL de la foto de perfil">
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>
