<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Concerns\HasVersion4Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Importamos la clase Str para generar el UUID


class categorias extends Model
{

    // definimos la llave primaria
    protected $primaryKey = 'id';

    // coloquemos los campos que se van a llenar en la base de datos
    protected $fillable = [
        'titulo',
        'slug',
        'uuid'
    ];


    /**
     * El método booted intercepta las operaciones del modelo.
     * Aquí automatizamos el llenado del campo 'uuid'.
     */
    protected static function booted()
    {
        // Antes de que Laravel inserte un nuevo registro en la base de datos...
        static::creating(function (categorias $categoria) {
            // ...llenamos el campo 'uuid' con un UUID Versión 4 de forma automática
            if (empty($categoria->uuid)) {
                $categoria->uuid = (string) Str::uuid();
            }
        });
    }

    public function publicaciones(){
        // declaramos la relacion de la tabla categorias con la tabla publicaciones,
        // el primer parametro es el modelo de la tabla publicaciones, el segundo parametro es el nombre de la llave foranea en la tabla publicaciones,
        // y el tercer parametro es el nombre de la llave primaria en la tabla categorias
        // el hasmany es una relacion de uno a muchos, es decir, una categoria puede tener muchas publicaciones,
        //  pero una publicacion solo puede pertenecer a una categoria
        return $this->hasMany(publicaciones::class, 'categoria_id', 'id');
    }
}
