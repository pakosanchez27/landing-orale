<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Auth;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuariosController extends Controller
{
    public function __construct() {}

    public function index()
    {
        if (auth()->user()->role_id !== 1) {
            $users = User::with('role')->orderBy('name')->get();

            return view('admin.usuarios.index', compact('users'));
        } else {
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

    public function edit(User $user)
    {
        $roles = Role::orderBy('id')->get();

        return view('admin.usuarios.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'cargo' => ['nullable', 'string', 'max:255'],
            'role_id' => ['required', 'exists:roles,id'],
            'password' => ['nullable', 'min:8', 'confirmed'],
            'imagen' => ['nullable', 'image', 'max:2048'],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->cargo = $validated['cargo'] ?? null;
        $user->role_id = $validated['role_id'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

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

        return redirect()->route('usuarios')->with('status', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        if (auth()->id() === $user->id) {
            return redirect()->route('usuarios')->withErrors('No puedes eliminar tu propio usuario.');
        }

        $user->delete();

        return redirect()->route('usuarios')->with('status', 'Usuario eliminado correctamente.');
    }

    public function resetPassword(User $user)
    {
        $temporaryPassword = Str::random(10);
        $user->password = Hash::make($temporaryPassword);
        $user->save();

        return redirect()->route('usuarios')->with(
            'status',
            'Contraseña restablecida para ' . $user->email . '. Temporal: ' . $temporaryPassword
        );
    }
}
