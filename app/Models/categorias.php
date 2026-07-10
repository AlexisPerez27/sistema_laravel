<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class categorias extends Model
{
    // cuando se crea el modelo es necesario en el archivo del modelo colocar los campos que se van a llenar en la base de datos
    use HasFactory;

    // definimos la llave primaria
    protected $primaryKey = 'id';

    // coloquemos los campos que se van a llenar en la base de datos
    protected $fillable = [
        'titulo',
        'slug',
    ];

    public function publicaciones(){
        // declaramos la relacion de la tabla categorias con la tabla publicaciones,
        // el primer parametro es el modelo de la tabla publicaciones, el segundo parametro es el nombre de la llave foranea en la tabla publicaciones,
        // y el tercer parametro es el nombre de la llave primaria en la tabla categorias
        // el hasmany es una relacion de uno a muchos, es decir, una categoria puede tener muchas publicaciones,
        //  pero una publicacion solo puede pertenecer a una categoria
        return $this->hasMany(publicaciones::class, 'categoria_id', 'id');
    }
}
