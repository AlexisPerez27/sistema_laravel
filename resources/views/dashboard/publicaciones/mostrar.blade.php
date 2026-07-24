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
    <h1>{{ $pub->titulo }}</h1>
    <span>{{ $pub->publicado }}</span><br>
    <span>{{ $pub->categorias->titulo }} </span>

    <div>{{ $pub->contenido }}</div>
    <div>{{ $pub->descripcion }}</div>

    <div>
        <img src="../uploads/posts/{{ $pub->imagen }}" alt="{{ $pub->titulo }}" style="width: 250px">
    </div>
</div>  
@endsection
