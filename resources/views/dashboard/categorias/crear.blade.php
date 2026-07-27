{{-- heredamos platilla de dashboard --}}
@extends('plantilla.plantilla')

@section('titulo', 'Alta de Categorias')


{{-- agregamos la seccion donde empezara a escribir el contenido de la pagina --}}
@section('contenido')
    <h3>Alta de categorias</h3>

    {{-- incluimos los errores de validacion que se puedan presentar en el formulario, si es que los hay --}}
    @include('dashboard.fragmentos.errores_forms')
    
    <div id="categorias">
        <form action="{{ route("categorias.store") }}" method="post">
            @csrf
            <label for="titulo">Titulo</label>
            <input type="text" value="" name="titulo" id="titulo">
            <br>

            <label for="slug">Slug</label>
            <input type="text" value="" name="slug" id="slug">
            <br>

            <button type="submit">Guardar</button>
        </form>
    </div>

@endsection
