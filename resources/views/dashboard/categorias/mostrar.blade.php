{{-- heredamos platilla de dashboard --}}
@extends('plantilla.plantilla')

@section('titulo', 'Editar de Categorias')


{{-- agregamos la seccion donde empezara a escribir el contenido de la pagina --}}
@section('contenido')
    <h3>Mostrar Categoria</h3>

    <div id="categorias">
        <h4>{{ $cat->titulo }}</h4>

        
        <p>
            <span>Contenido slug:</span> <br>
            {{ $cat->slug }}
        </p>
    </div>

@endsection
