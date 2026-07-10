<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\publicaciones;
// use App\Models\categorias;
use Illuminate\Http\Request;

class c_publicaciones extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pub = publicaciones::find(3); // para buscar un registro en la base de datos por su id
        // $cat = categorias::find(1); // para buscar un registro en la base de datos por su id

        dd($pub->categorias->titulo); // para ver el resultado de la busqueda en la base de datos y mostrar el titulo de la categoria a la que pertenece la publicacion

        // dd($cat->publicaciones[0]->titulo); // para ver el resultado de la busqueda en la base de datos y mostrar todas las publicaciones que pertenecen a la categoria
        // json de ejemplo 
        // return response()->json([
        //     'status' => 200,
        //     'publicacion' => $pub
        // ]);

        // $pub -> delete(); // sirve para eliminar un registro en la base de datos, primero se busca el registro y luego se elimina con el metodo delete

        // sirve para actualizar un registro en la base de datos, primero se busca el registro y luego se actualiza con el metodo update
        // $pub->update([
        //     'titulo' => 'titulo de la publicacion actualizado',
        //     'slug' => 'slug-de-la-publicacion-actualizado',
        //     'descripcion' => 'descripcion de la publicacion actualizado',
        //     'contenido' => 'contenido de la publicacion actualizado',
        //     'imagen' => 'ruta-de-la-imagen-actualizado.jpg',
        //     'publicado' => 'no',
        //     'categoria_id' => 1
        // ]);

        // vamos hacer prueba de insercion
        // publicaciones::create([
        //     'titulo' => 'titulo de la publicacion',
        //     'slug' => 'slug-de-la-publicacion',
        //     'descripcion' => 'descripcion de la publicacion',
        //     'contenido' => 'contenido de la publicacion',
        //     'imagen' => 'ruta-de-la-imagen.jpg',
        //     'publicado' => 'si',
        //     'categoria_id' => 1
        // ]);
        // dd($pub->titulo); // para ver el resultado de la insercion en la base de datos



        return "hola desde el controlador de publicaciones";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(publicaciones $publicaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(publicaciones $publicaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, publicaciones $publicaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(publicaciones $publicaciones)
    {
        //
    }
}
