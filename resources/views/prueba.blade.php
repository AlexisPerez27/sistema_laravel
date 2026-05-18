<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>esto es una prueba</h1>

    {{-- asi se hace con html normal --}}
    <a href="./envio_datos">ir a datos<a>
        <br>
    {{-- asi se haria con el motor blade de laravel --}}
    <a href="{{ route("nombre_ruta") }}">ir a nombre de la ruta</a>
</body>
</html>