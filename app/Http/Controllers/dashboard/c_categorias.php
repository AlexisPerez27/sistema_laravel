<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\categorias\r_store;
use App\Http\Requests\categorias\r_update;
use App\Models\categorias;
use Illuminate\Http\Request;

class c_categorias extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = categorias::paginate(3);
        return view("dashboard.categorias.index",['cat'=>$cat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.categorias.crear");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(r_store $request)
    {
        $cat = categorias::create($request->validated());

        return to_route("categorias.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(categorias $categoria)
    {
        return view("dashboard.categorias.mostrar",["cat"=>$categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat = categorias::find($id);
        return view("dashboard.categorias.editar",["cat"=>$cat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(r_update $request, categorias $categoria)
    {
        $datos = $request->validated();

        $categoria->update($datos);

        return to_route("categorias.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categorias $categoria)
    {
        $categoria->delete();

        return to_route("categorias.index");
    }
}
