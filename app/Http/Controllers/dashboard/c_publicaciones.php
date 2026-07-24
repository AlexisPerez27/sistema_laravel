<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\publicaciones;
use App\Models\categorias;
use App\Http\Requests\publicaciones\r_store;
use App\Http\Requests\publicaciones\r_update;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

class c_publicaciones extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pub = publicaciones::paginate(3); // sirve para paginar los resultados de la consulta a la base de datos, en este caso se paginara de 5 en 5
        // $pub = publicaciones::all(); // para traer todos los registros de la tabla publicaciones
        // $pub = publicaciones::find(3); // para buscar un registro en la base de datos por su id
        // $cat = categorias::find(1); // para buscar un registro en la base de datos por su id

        // dd($pub->categorias->titulo); // para ver el resultado de la busqueda en la base de datos y mostrar el titulo de la categoria a la que pertenece la publicacion

        // categorias::create([
        //     'titulo' => 'categoria de prueba',
        //     'slug' => 'categoria-de-prueba',
        // ]);

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


        // para mandar a llamar la vista index.blade.php que esta dentro de la carpeta publicaciones que esta dentro de la carpeta dashboard
        //  y le pasamos los datos de la variable $pub
        return view("dashboard.publicaciones.index",["pub"=>$pub]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // trae toda la informacion de la tabla categorias y la devuelve en un array asociativo con el id como llave y el titulo como valor
        // $cat = categorias::get();
        // solo trae la informacion de la tabla categorias y la devuelve en un array asociativo con el id como llave y el titulo como valor
        // pluck es un metodo de laravel que sirve para traer solo un campo de la tabla y devolverlo en un array asociativo con el id como llave y el titulo como valor
        //nota importante pluck agrupa los datos, aqui habia dos filas con el titlo igual y las agrupo y solo trajo el ultimo id, solo para tenerlo en cuenta
        $cat = categorias::pluck('id', 'titulo');
        // dd($cat);
        return  view("dashboard.publicaciones.crear",["cat"=>$cat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(r_store $request)
    {
        // dd($request->all()); // para ver los datos que se estan enviando desde el formulario

        // variables que guardan informacion del formulario que se envia desde la vista crear.blade.php
        $titulo = $request->titulo;
        $slug = $request->slug;
        $descripcion = $request->descripcion;
        $contenido = $request->contenido;
        // $imagen = $request->imagen;
        $publicado = $request->publicado;
        $categoria_id = $request->categoria_id;

        // aqui definimos la insercion en nuestra tabla de la base de datos desde el formulario campo por campo
        // $pb = publicaciones::create([
        //     'titulo' => $titulo,
        //     'slug' => $slug,
        //     'descripcion' => $descripcion,
        //     'contenido' => $contenido,
        //     // 'imagen' => $imagen,
        //     'publicado' => $publicado,
        //     'categoria_id' => $categoria_id
        // ]);

        // validamos los datos que se estan enviando desde el formulario, si no cumplen con las reglas de validacion,
        //  se redirecciona a la vista crear.blade.php con los errores
        // $request->validate([
        //     'titulo' => 'required|string|max:100',
        //     'slug' => 'required|string|max:100|unique:publicaciones,slug',
        //     'descripcion' => 'required|string|max:255',
        //     'contenido' => 'required|string',
        //     // 'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'publicado' => 'required|in:si,no',
        //     'categoria_id' => 'required|exists:categorias,id',
        // ]);

        // segunda forma de validar los datos que se estan enviando desde el formulario, si no cumplen con las reglas de validacion,
        //  se redirecciona a la vista crear.blade.php con los errores
        // Validator::make($request->all(), [
        //     'titulo' => 'required|string|max:100',
        //     'slug' => 'required|string|max:100|unique:publicaciones,slug',
        //     'descripcion' => 'required|string|max:255',
        //     'contenido' => 'required|string',
        //     // 'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'publicado' => 'required|in:si,no',
        //     'categoria_id' => 'required|exists:categorias,id',
        // ])->validate();

        // otra forma mas rapida si es que queremos agregar todos los campos del formulario a la base de datos sin tener que definir cada variable,
        //  pero para esto debemos tener en el modelo de la tabla la propiedad fillable con los campos que queremos insertar,
        //   si no lo tenemos nos dara error de asignacion masiva
        // $pb = publicaciones::create($request->all());
        $pb = publicaciones::create($request->validated()); // si usamos la clase de validacion r_store, podemos usar el metodo validated() para obtener los datos validados y no tener que definir cada variable


        // dd($pb); // para ver el resultado de la insercion en la base de datos

        return to_route("post.index"); // redirecciona a la ruta post.index que es la ruta del metodo index del controlador c_publicaciones
    }

    /**
     * Display the specified resource.
     */
    public function show(publicaciones $post)
    {
        return view("dashboard.publicaciones.mostrar",['pub'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     * NOTA: ES FORZOSO QUE LA VARIABLE $POST SE LLAME IGUAL A LA QUE MUESTRA EN LA RUTA QUE APUNTA A MI CONTROLADOR
     * GET|HEAD        post/{post}/edit ....................................................................................................................................................... post/edit › dashboard\c_publicaciones@edit
     *
     */
    public function edit(publicaciones $post)
    {
        $cat = categorias::pluck('id','titulo');
        return view("dashboard.publicaciones.editar",['pub'=>$post,"cat"=>$cat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(r_update $request, publicaciones $post)
    {
        $datos = $request->validated();

        // dd($request->imagen);

        // verificamos que si se haya subido una imagen
        if(isset($datos['imagen'])){
            // es el campo de formulario datos['imagen']
            $datos['imagen'] = $fillname = time().".".$datos['imagen']->extension();

            // para obtener imagen del formulario y mover la imagen temp a una carperta dentro del proyecto
            $request->imagen->move(public_path('uploads/posts'),$fillname);
        }

        $post->update($datos);

        return to_route("post.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(publicaciones $post)
    {
        $post->delete();

        // dd($post);
        return to_route("post.index");
    }
}
