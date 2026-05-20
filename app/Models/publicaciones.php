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
}
