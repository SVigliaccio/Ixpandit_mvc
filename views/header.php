<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Ixpandit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="container mt-5 mb-3">
    <header>
        <h1>Pokemon finder</h1>
        <p>El que quiere Pokemon, que lo busque.</p>

        <form class="column g-3 align-items-baseline" method="post" action="<?= URL_RAIZ ."main/searchPokemon"?>">
            <div class="form-floating mb-3 col-12">
                <input type="text" class="form-control" id="pokemon_name" name="pokemon_name" placeholder="" required>
                <label for="pokemon_name">Ingrese el nombre a buscar</label>
            </div>
            <button class="btn btn-warning col-12" type="submit">Buscar</button>
        </form>
    </header>
</body>
</html>