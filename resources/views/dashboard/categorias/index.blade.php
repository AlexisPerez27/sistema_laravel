{{-- heredamos platilla de dashboard --}}
@extends('plantilla.plantilla')

@section('titulo', 'Lista de Categorias')


{{-- agregamos la seccion donde empezara a escribir el contenido de la pagina --}}
@section('contenido')
    <h3>tabla de categorias</h3>

    <div id="tabla">
        <a href="{{ route("categorias.create") }}">Alta Categorias</a>
        <a href="{{ route("post.index") }}">Ver Publicaciones</a>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>SLUG</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cat as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->titulo }}</td>
                        <td>{{ $c->slug }}</td>
                        <td>
                            <a href="{{ route("categorias.show",$c->id) }}">Mostrar</a>
                            <a href="{{ route("categorias.edit",$c->id) }}">Editar</a>
                            <form action="{{ route("categorias.destroy",$c->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                {{-- <input type="text" value="{{ $c->id }}" name="id_eli" id="id_eli"> --}}
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{ $cat->links() }}
    </div>

@endsection
