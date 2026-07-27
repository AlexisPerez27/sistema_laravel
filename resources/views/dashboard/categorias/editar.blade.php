{{-- heredamos platilla de dashboard --}}
@extends('plantilla.plantilla')

@section('titulo', 'Editar de Categorias')


{{-- agregamos la seccion donde empezara a escribir el contenido de la pagina --}}
@section('contenido')
    <h3>Editar Categoria</h3>

    {{-- incluimos los errores de validacion que se puedan presentar en el formulario, si es que los hay --}}
    @include('dashboard.fragmentos.errores_forms')

    <div id="categorias">
        <form action="{{ route("categorias.update",$cat->id ) }}" method="post">
            @csrf
            @method("PUT")
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" value="{{ old("titulo",$cat->titulo) }}">
            <br>

            <label for="slug">Slug</label>
            <input type="text"  name="slug" id="slug" value="{{ old("slug",$cat->slug) }}">
            <br>

            <button type="submit">Guardar</button>
        </form>
    </div>

@endsection
