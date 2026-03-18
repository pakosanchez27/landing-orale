<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormularioDemosRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $imageRules = ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'];

        if ($this->isMethod('post')) {
            array_unshift($imageRules, 'required');
        } else {
            array_unshift($imageRules, 'nullable');
        }

        return [
            'titulo' => ['required', 'string', 'max:255'],
            'industria' => ['required', 'integer', 'exists:industrias,id'],
            'descripcion' => ['required', 'string', 'max:5000'],
            'link' => ['required', 'url', 'max:255'],
            'imagen' => $imageRules,
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'El titulo es obligatorio.',
            'titulo.max' => 'El titulo no puede exceder 255 caracteres.',
            'industria.required' => 'La industria es obligatoria.',
            'industria.integer' => 'La industria seleccionada no es valida.',
            'industria.exists' => 'La industria seleccionada no existe.',
            'descripcion.required' => 'La descripcion es obligatoria.',
            'descripcion.max' => 'La descripcion no puede exceder 5000 caracteres.',
            'link.required' => 'El link es obligatorio.',
            'link.url' => 'Debes ingresar una URL valida.',
            'link.max' => 'El link no puede exceder 255 caracteres.',
            'imagen.required' => 'La imagen es obligatoria.',
            'imagen.image' => 'El archivo debe ser una imagen valida.',
            'imagen.mimes' => 'La imagen debe ser jpg, jpeg, png o webp.',
            'imagen.max' => 'La imagen no puede pesar mas de 2 MB.',
        ];
    }
}
