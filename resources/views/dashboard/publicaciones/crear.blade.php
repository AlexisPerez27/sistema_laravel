{{-- heredamos platilla de dashboard --}}
@extends('plantilla/plantilla')

{{-- esta es una forma de agregar un titulo a la pagina que se esta creando, en este caso es para la pagina de crear publicacion --}}
{{-- @section("titulo") Crear Publicacion @endsection --}}
{{-- esta es otra forma de agregar un titulo a la pagina que se esta creando, en este caso es para la pagina de crear publicacion --}}
@section("titulo", "Crear Publicacion")

{{-- agregamos la seccion donde empezara a escribir el contenido de la pagina --}}
@section("contenido")
<div id="formulario">
    <h1>Formulario para crear una publicacion</h1>
    <form action="#" method="POST">
        @csrf
        <label for="titulo">Titulo de la publicacion</label>
        <input type="text" name="titulo" id="titulo" placeholder="Titulo de la publicacion">
        <br>
        <label for="contenido">Contenido de la publicacion</label>
        <textarea name="contenido" id="contenido" cols="30" rows="10" placeholder="Contenido de la publicacion"></textarea>
        <br>
        <label for="categoria">Categoria de la publicacion</label>
        
        <select name="categoria_id" id="categoria_id">
            <option value="">Seleccione una categoria</option>
            @foreach ($cat as $titulo => $id)
                <option value="{{ $id }}">{{ $titulo }}</option>
            @endforeach          
        </select>
        <br>
        <label for="imagen">Imagen de la publicacion</label>
        <input type="img" name="imagen" id="imagen" placeholder="Imagen de la publicacion">
        <br>
        <label for="publicado">Publicado</label>
        <select name="publicado" id="publicado">
            <option value="si">Si</option>
            <option value="no">No</option>
        </select>
        <br>
        <button type="submit">Crear publicacion</button>
    </form>
</div>
@endsection

