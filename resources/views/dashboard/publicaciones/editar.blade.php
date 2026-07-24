{{-- heredamos platilla de dashboard --}}
@extends('plantilla.plantilla')

{{-- esta es una forma de agregar un titulo a la pagina que se esta creando, en este caso es para la pagina de crear publicacion --}}
{{-- @section("titulo") Crear Publicacion @endsection --}}
{{-- esta es otra forma de agregar un titulo a la pagina que se esta creando, en este caso es para la pagina de crear publicacion --}}
@section("titulo", "Editar Publicacion")


{{-- agregamos la seccion donde empezara a escribir el contenido de la pagina --}}
@section("contenido")

{{-- incluimos los errores de validacion que se puedan presentar en el formulario, si es que los hay --}}
@include('dashboard.fragmentos.errores_forms')

<div id="formulario">
    <h1>Formulario para editar una publicacion</h1>
    <form action="{{ route("post.update",$pub->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <label for="titulo">Titulo de la publicacion</label>
        <input type="text" name="titulo" id="titulo" placeholder="Titulo de la publicacion" value="{{ old("titulo",$pub->titulo) }}">
        <br>
        <label for="slug">Slug de la publicacion</label>
        <input type="text" name="slug" id="slug" placeholder="Slug de la publicacion" value="{{ old("slug",$pub->slug )}}">
        <br>
        <label for="descripcion">Descripcion de la publicacion</label>
        <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion de la publicacion" value="{{ old("descripcion",$pub->descripcion) }}">
        <br>
        <label for="contenido">Contenido de la publicacion</label>
        <textarea name="contenido" id="contenido" cols="30" rows="10" placeholder="Contenido de la publicacion">{{ old("contenido",$pub->contenido) }}</textarea>
        <br>
        <label for="categoria">Categoria de la publicacion</label>
        <select name="categoria_id" id="categoria_id">
            <option value="">Seleccione una categoria</option>
            @foreach ($cat as $titulo => $id)
                <option value="{{ $id }}" {{ old("categoria_id",$pub->categoria_id) == $id ? 'selected' : '' }}>{{ $titulo }}</option>
            @endforeach          
        </select>
        <br>
        <label for="imagen">Imagen de la publicacion</label>
        <input type="file" name="imagen" id="imagen" placeholder="Imagen de la publicacion">
        <br>
        <label for="publicado">Publicado</label>
        <select name="publicado" id="publicado">
            <option value="si" {{ old("publicado",$pub->publicado) == 'si' ? 'selected' : '' }}>Si</option>
            <option value="no" {{ old("publicado",$pub->publicado) == 'no' ? 'selected' : '' }}>No</option>
        </select>
        <br>
        <button type="submit">Editar publicacion</button>
    </form>
</div>
@endsection
