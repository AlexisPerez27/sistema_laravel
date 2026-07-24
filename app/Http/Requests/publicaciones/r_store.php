<?php

namespace App\Http\Requests\publicaciones;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class r_store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {   
        //siempre teiene que ir en false ya que no estamos usando autorizaciones
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
    //     aqui dentro colocamos las validaciones que queremos que se apliquen a los campos del formulario,
    //      estas validaciones se aplicaran cuando se envie el formulario y se reciban los datos en el controlador
        return [
            'titulo' => 'required|string|min:5|max:100',
            'slug' => 'required|string|min:5|max:100|unique:publicaciones',
            'descripcion' => 'required|string|max:255',
            'contenido' => 'required|string',
            // 'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publicado' => 'required|in:si,no',
            'categoria_id' => 'required|exists:categorias,id',
        ];
    }
}
