<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publicaciones extends Model
{
    use HasFactory;

    // cuando se crea el modelo es necesario en el archivo del modelo colocar los campos que se van a llenar en la base de datos

    // definimos la llave primaria
    protected $primaryKey = 'id';

    // coloquemos los campos que se van a llenar en la base de datos
    protected $fillable = [
        'titulo',
        'slug',
        'descripcion',
        'contenido',
        'imagen',
        'publicado',
        'categoria_id'
    ];

    //funcion para relacionar la tabla publicaciones con la tabla categorias
    public function categorias(){
        // declaramos la relacion de la tabla publicaciones con la tabla categorias,
        // el primer parametro es el modelo de la tabla categorias, el segundo parametro es el nombre de la llave foranea en la tabla publicaciones,
        // y el tercer parametro es el nombre de la llave primaria en la tabla categorias
        // el belongsTo es una relacion de muchos a uno, es decir, muchas publicaciones pueden pertenecer a una categoria, 
        // pero una categoria solo puede tener muchas publicaciones
        return $this->belongsTo(categorias::class, 'categoria_id', 'id');
    }
}
