<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            "file" => "required|image|mimes:png,jpg,gif|max:20000"
        ];
    }

    public function messages()
    {
        return [
            "file.required" => "La imagen es requerida",
            "file.image" => "El archivo debe ser una imagen",
            "file.mimes" => "Tipo de archivo no aceptado de ser jpg, png o gif",
            "file.max" => "La imagen excedio el peso permitido",
        ];
    }
}
