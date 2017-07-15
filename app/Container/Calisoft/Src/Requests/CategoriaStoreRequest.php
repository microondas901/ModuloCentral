<?php

namespace App\Container\Calisoft\Src\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'nombre' => 'required|string|unique:TBL_Categorias',
          'plataforma' => 'required|integer',
          'modelado' => 'required|integer',
          'despliegue' => 'required|integer',
          'entidad_relacion' => 'required|integer',
          'clases' => 'required|integer',
          'actividades' => 'required|integer',
          'sequencia' => 'required|integer',
          'uso' => 'required|integer',
        ];
    }
}
