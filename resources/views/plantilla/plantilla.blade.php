<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plantilla</title>
</head>
<body>
    <header>
        <h4>Esto es el header</h4>
    </header>

    {{-- estas son funciones que pueden heredar las demas paginas para saber en donde se debe colocar ciertos contenidos de la pagina --}}
    @yield("contenido")
    
    <section>
        @yield("contenido_dos")
    </section>
</body>
</html>