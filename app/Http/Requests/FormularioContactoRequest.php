<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormularioContactoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:60',
            'whatsapp_codigo' => 'required|in:+52,+1,+34,+57,+54,+56,+51',
            'whatsapp' => 'required|digits:10',
            'correo' => 'required|email|max:60',
            'mensaje' => 'required',
            'industria' => 'required',
            'paquete' => 'required',
            'aviso_privacidad' => 'accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto.',
            'nombre.max' => 'El nombre no puede superar 60 caracteres.',
            'whatsapp_codigo.required' => 'Selecciona un c&oacute;digo de pa&iacute;s.',
            'whatsapp_codigo.in' => 'Selecciona un c&oacute;digo de pa&iacute;s v&aacute;lido.',
            'whatsapp.required' => 'El WhatsApp es obligatorio.',
            'whatsapp.digits' => 'El WhatsApp debe tener 10 digitos.',
            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'El correo no es valido.',
            'correo.max' => 'El correo no puede superar 60 caracteres.',
            'mensaje.required' => 'El mensaje es obligatorio.',
            'industria.required' => 'Selecciona una industria.',
            'paquete.required' => 'Selecciona un paquete.',
            'aviso_privacidad.accepted' => 'Debes aceptar el Aviso de Privacidad.',
        ];
    }
}
