{{-- aqui se hereda la plantilla principal de la pagina --}}
@extends('plantilla/plantilla')

{{-- esto es una seccion de la pagina de la plantilla, puede haber mas secciones con nombres diferentes --}}
@section("contenido")
    <h1>Vista de Contacto 1</h1>

    {{-- mandamos a traer variables desde el controlador --}}
    <p>{{ $datos_bd[0] }}</p>
    <p>{{ $categorias[0] }}</p>

    {{-- para mandar a traerlo desde un for --}}
    <p>
        <ul>
            @foreach ($datos_bd as $d )
                <li>{{ $d }}</li>                
            @endforeach
        </ul>
    </p>

    {{-- mandamos a traer variable desde la ruta --}}
    {{-- <p>{{ $nombre }}</p>

    @if ($nombre != "Alex")
        Tu nombre no es Alex
    @else
        Tu nombre es Alex <br>
    @endif --}}


    @foreach ([1,2,3,4,5] as $item)
        {{ $item }} <br>
    @endforeach 
@endsection