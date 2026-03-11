<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioContactoRequest;
use App\Mail\ConfirmacionCliente;
use App\Mail\NuevoCliente;
use Illuminate\Support\Facades\Mail;

class FormularioController extends Controller
{
    public function enviar(FormularioContactoRequest $request)
    {
        // Datos validados
        $data = $request->validated();

        $equipo = [
            'contacto@oraleweb.com',
            'francisco.sanchez@oraleweb.com',
            'javier.sanchezjps27@gmail.com',
            'yulisa.felix@oraleweb.com',
            'antoniovalentindev@oraleweb.com'
        ];


        // Enviar email al equipo
        Mail::to($equipo)->send(new NuevoCliente($data));

        // Enviar confirmacion al cliente

        Mail::to($data['correo'])
            ->send(new ConfirmacionCliente($data));
    

        // Opcional: redireccionar con mensaje
        return back()->with('success', 'Tu mensaje fue enviado correctamente.');
    }
}
