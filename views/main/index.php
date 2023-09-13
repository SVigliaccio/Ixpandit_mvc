<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Ixpandit</title>
</head>
<body>
    <?php require 'views/header.php'; ?>
    <main class="mt-5">
        <h2 class="mb-4">Resultados de la búsqueda</h2>
        <div class = "container" id="pokelist">
            <?php 
            isset($_SESSION['pokemonsCollection']) ? $this->generateCard($_SESSION['pokemonsCollection']) : '';
            ?>
        </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>