<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plataforma</title>
  <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex justify-center items-center">
  <div class="container mx-auto px-4 py-8">
    <div class="bg-white border border-gray-200 rounded-lg p-8 max-w-md mx-auto shadow-lg">
      <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Bienvenido a la Plataforma</h2>
        <div class="flex justify-center space-x-4">
          <a href="registro.php">
            <button class="px-4 py-2 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700 transition duration-300">Registrarse</button>
          </a>
          <a href="login.php">
            <button class="px-4 py-2 bg-gray-300 text-gray-700 font-bold rounded-full hover:bg-gray-400 transition duration-300">Iniciar Sesión</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

