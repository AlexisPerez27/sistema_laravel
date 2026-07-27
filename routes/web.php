<?php

use App\Http\Controllers\dashboard\c_categorias;
use App\Http\Controllers\dashboard\c_publicaciones;
use App\Http\Controllers\Prueba;
use App\Models\categorias;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

Route::get('/', function () {
    return view('welcome');
});


// prueba para las rutas
Route::get('/hola', function () {
    return "hola mundo";
});

// para mandar a llamar una vista 
Route::get('/prueba',function(){
    return view("prueba");
});



// para mandar a llamar una vista que esta dentro de una carpeta
Route::get('/plantilla',function(){
    return view("plantilla/plantilla"); //nota: tambien se puede colocar plantilla.plantilla
});


// para enviar datos en una ruta
Route::get('/envio_datos',function(){
    $edad = 27;
    $datos = ['nombre' => 'Alex', 'edad' => $edad];

    return view("datos", $datos);
});

// para agregar nombre a las rutas
Route::get('/nombre_rutas', function () {
    return view("nombre_ruta");
})->name("nombre_ruta");


// rutas de practias
Route::get('/contacto', function () {
    return view("contacto",["nombre"=>"Alex"]);
})->name("contacto");

Route::get('/contacto2', function () {
    return view("contacto2");
})->name("contacto2");


// routa para redireccionar a una nueva vista
Route::get('/redireccion', function () {
    // return "vista para redireccionar una ruta";
    // return redirect("contacto"); // siempre se coloca la ruta NO el nombre
    // return redirect()->route("contacto"); // de esta forma siempre se ocupara el nombre de la ruta
    return to_route("contacto"); // es igual que la funcion de arriba redirect()->route("contacto") pero con menos codigo
});



//para mandar a llamar vista desde un controlador
Route::get('/prueba', [Prueba::class,'index']);

// para una ruta resouce desde el controlador
//sirve para evitar mandar a llamar los multiples metodos del controlador DELETE,PUT,PATCH,SHOW,ETC
// Route::resource('post',Prueba::class);

// para enviar datos a travez de una ruta 
Route::get('/envio/{dato}',[Prueba::class,'envio']);


// ==================================== PARA CRUD EN CONTROLADOR PUBLICACIONES=========================================================
route::resource('post',c_publicaciones::class);
// agregmos una ruta para crear una publicacion donde entra a la funcion create del controlador c_publicaciones
route::get('post/create',[c_publicaciones::class,'create'])->name('post.create');


//agregamos la ruta para poder actualizar, donde entra a la funcion update del controlador c_publicaciones
route::post('post/{post}',[c_publicaciones::class,'update'])->name('post.update');


// agregamos una ruta para editar la publicacion donde entra a la funcion edit del controlador c_publicaciones
route::get('post/{post}/edit',[c_publicaciones::class,'edit'])->name('post.edit');

//agregmos ruta para eliminar publicacion donde entra a la funcion destroy del controlador c_publicaciones
Route::post('post/{post}', [c_publicaciones::class,'destroy'])->name("post.delete");

// agregmos ruta para mostrar detalle de la publicacion donde entra a la funcion show del controlador c_publicaciones
route::get("post/{post}",[c_publicaciones::class,'show'])->name("post.show");



// ==================================== PARA CRUD EN CONTROLADOR CATEGORIAS =========================================================
// agregamos ruta para visualizar el index de las categorias, que entra a la funcion index dentro den controlador c_categorias
Route::resource("categorias",c_categorias::class);

// agregamos ruta visualizzar el formulario create de categorias que entra en la funcion create dentro del controlador c_categorias
route::get("categorias/create",[c_categorias::class,'create'])->name("categorias.create");

//agregamos ruta para visualizar formulario de actualizar categorias, donde entra en la funcion edit dentro del controlador c_categorias
Route::get("categorias/{categoria}/edit",[c_categorias::class,'edit'])->name("categorias.edit");

// agregamos ruta para actualizar las categorias, donde entra a la funcion update dentro del controlador c_categorias
Route::post("categorias/{categoria}",[c_categorias::class,'update'])->name("categorias.update");

// agregamos ruta para eliminar las categorias, donde entra a la funcion destroy dentro del controlador c_categorias
Route::post("categorias/{categoria}",[c_categorias::class,'destroy'])->name("categorias.destroy");

// agregamos ruta para mostrar las categorias, donde entra a la funcion show dentro del controlador c_categorias
Route::get("categorias/{categoria}",[c_categorias::class,'show'])->name("categorias.show");