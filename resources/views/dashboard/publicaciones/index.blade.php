{{-- heredamos platilla de dashboard --}}
@extends('plantilla.plantilla')

{{-- esta es una forma de agregar un titulo a la pagina que se esta creando, en este caso es para la pagina de crear publicacion --}}
{{-- @section("titulo") Crear Publicacion @endsection --}}
{{-- esta es otra forma de agregar un titulo a la pagina que se esta creando, en este caso es para la pagina de crear publicacion --}}
@section("titulo", "Lista de Publicaciones")

{{-- agregamos la seccion donde empezara a escribir el contenido de la pagina --}}
@section("contenido")
    <div><a href="{{ route('post.create') }}">Crear Publicacion</a></div>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Slug</th>
                <th>Descripcion</th>
                <th>Contenido</th>
                <th>Publicado</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pub as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->titulo }}</td>
                    <td>{{ $p->slug }}</td>
                    <td>{{ $p->descripcion }}</td>
                    <td>{{ $p->contenido }}</td>
                    <td>{{ $p->publicado }}</td>
                    <td>{{ $p->categorias->titulo }}</td>
                    <td>
                        <a href="{{ route("post.show",$p->id) }}">Mostrar</a>
                        <a href="{{ route('post.edit', $p->id) }}">Editar</a>
                        <a href="{{ route("post.destroy", $p->id) }}">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- para mostrar la paginacion de los resultados de la consulta a la base de datos, en este caso se paginara de 3 en 3 --}}
    {{ $pub -> links() }}

@endsection
