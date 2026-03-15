<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        // 1. Validación de datos
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'imagen' => ['nullable', 'image', 'max:2048'],
            'current_password' => ['nullable', 'required_with:new_password', 'current_password'],
            'new_password' => ['nullable', 'required_with:current_password', 'min:8', 'confirmed'],
        ]);

        $user = $request->user();
        $user->name = $data['name'];

        // 2. Gestión de la imagen de perfil
        if ($request->hasFile('imagen')) {
            $path = public_path('uploads/profiles');
            
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }

            $file = $request->file('imagen');
            $filename = uniqid('profile_', true) . '.' . $file->getClientOriginalExtension();
            
            $file->move($path, $filename);
            
            // Guardamos la ruta en la base de datos
            $user->imagen = 'uploads/profiles/' . $filename;
        }

        // 3. Actualización de contraseña si se proporcionó una nueva
        if (!empty($data['new_password'])) {
            $user->password = Hash::make($data['new_password']);
        }

        $user->save();

        return back()->with('status', 'Perfil actualizado correctamente.');
    }
}