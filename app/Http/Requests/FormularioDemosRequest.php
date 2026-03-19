<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class FormularioDemosRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo' => ['required', 'string', 'max:255'],
            'industria' => ['required', 'integer', 'exists:industrias,id'],
            'descripcion' => ['required', 'string', 'max:5000'],
            'link' => ['required', 'url', 'max:255'],
            'imagen_base64' => $this->isMethod('post')
                ? ['required', 'string']
                : ['nullable', 'string'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $base64Image = $this->input('imagen_base64');

            if (!$base64Image) {
                if ($this->isMethod('post')) {
                    $validator->errors()->add('imagen', 'La imagen es obligatoria.');
                }

                return;
            }

            if (!preg_match('/^data:image\/([a-zA-Z0-9.+-]+);base64,/', $base64Image, $matches)) {
                $validator->errors()->add('imagen', 'La imagen debe ser jpg, jpeg, png o webp.');
                return;
            }

            $extension = strtolower($matches[1]);
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

            if (!in_array($extension, $allowedExtensions, true)) {
                $validator->errors()->add('imagen', 'La imagen debe ser jpg, jpeg, png o webp.');
                return;
            }

            $encoded = substr($base64Image, strpos($base64Image, ',') + 1);
            $binary = base64_decode($encoded, true);

            if ($binary === false) {
                $validator->errors()->add('imagen', 'La imagen no se pudo procesar correctamente.');
                return;
            }

            if (strlen($binary) > 2048 * 1024) {
                $validator->errors()->add('imagen', 'La imagen no puede pesar mas de 2 MB.');
            }
        });
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
            'imagen_base64.required' => 'La imagen es obligatoria.',
        ];
    }
}
