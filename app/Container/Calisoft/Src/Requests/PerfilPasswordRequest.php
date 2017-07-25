<?php

namespace App\Container\Calisoft\Src\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfilPasswordRequest extends FormRequest
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
            'PassActual' => 'required',
            'PassNew' => 'required|string|min:7|confirmed',
        ];
    }
}
