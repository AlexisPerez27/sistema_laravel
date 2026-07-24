<?php

namespace App\Http\Requests\publicaciones;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class r_update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //siempre tiene que ir en false ya que no estamos usuando autenticaciones
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|min:5|max:100',
            'slug' => 'required|string|min:5|max:100|unique:publicaciones,slug,'.$this->route("post")->id,
            'descripcion' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publicado' => 'required|in:si,no',
            'categoria_id' => 'required|exists:categorias,id',
        ];
    }
}
