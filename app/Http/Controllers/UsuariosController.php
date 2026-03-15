<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Auth;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function __construct() {}

    public function index()
    {
        
        if (auth()->user()->role_id !== 1) {
            return view('admin.usuarios.index');
        }else{
            return redirect()->route('admin');
        }
    }

    public function create()
    {
        $roles = Role::orderBy('id')->get();
        return view('admin.usuarios.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'cargo' => ['nullable', 'string', 'max:255'],
            'role_id' => ['required', 'exists:roles,id'],
            'imagen' => ['nullable', 'image', 'max:2048'],
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->cargo = $validated['cargo'] ?? null;
        $user->role_id = $validated['role_id'];

        if ($request->hasFile('imagen')) {
            $dir = public_path('uploads/profiles');
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }
            $file = $request->file('imagen');
            $filename = uniqid('profile_', true) . '.' . $file->getClientOriginalExtension();
            $file->move($dir, $filename);
            $user->imagen = 'uploads/profiles/' . $filename;
        }

        $user->save();

        return redirect()->route('usuarios')->with('status', 'Usuario creado correctamente.');
    }
}
