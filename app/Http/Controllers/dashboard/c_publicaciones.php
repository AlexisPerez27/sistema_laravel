<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\publicaciones;
use Illuminate\Http\Request;

class c_publicaciones extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // vamos hacer prueba de insercion
        publicaciones::create([
            'titulo' => 'titulo de la publicacion',
            'slug' => 'slug-de-la-publicacion',
            'descripcion' => 'descripcion de la publicacion',
            'contenido' => 'contenido de la publicacion',
            'imagen' => 'ruta-de-la-imagen.jpg',
            'publicado' => 'si',
            'categoria_id' => 1 
        ]);

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
