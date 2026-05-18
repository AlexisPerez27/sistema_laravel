<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datos</title>
</head>
<body>
    <h1>Datos</h1>
    {{-- esto se hace con php puro para obtener una variable de una ruta --}}
    <?php echo $nombre; ?> 

    {{-- para hacerlo con el motor de blade de laravel imprimir una variable es asi  --}}
    {{ $nombre }}
</body>
</html>