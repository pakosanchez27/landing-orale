<?php

namespace App\Http\Controllers;

use App\Mail\UserWelcomeSetPasswordMail;
use App\Models\Role;
use App\Models\User;
use App\Support\PublicUploadPath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class UsuariosController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if (auth()->user()->role_id !== 1) {
            $users = User::with('role')->orderBy('name')->get();

            return view('admin.usuarios.index', compact('users'));
        }

        return redirect()->route('admin');
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
            'cargo' => ['nullable', 'string', 'max:255'],
            'role_id' => ['required', 'exists:roles,id'],
            'imagen' => ['nullable', 'image', 'max:2048'],
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make(Str::random(40));
        $user->cargo = $validated['cargo'] ?? null;
        $user->role_id = $validated['role_id'];

        if ($request->hasFile('imagen')) {
            $dir = PublicUploadPath::make('uploads/profiles');
            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }

            $file = $request->file('imagen');
            $filename = uniqid('profile_', true) . '.' . $file->getClientOriginalExtension();
            $file->move($dir, $filename);
            $user->imagen = 'uploads/profiles/' . $filename;
        }

        $user->save();

        $this->sendPasswordSetupMail($user);

        return redirect()->route('usuarios')->with(
            'status',
            'Usuario creado correctamente. Se envio un correo para definir su contrasena.'
        );
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
            $dir = PublicUploadPath::make('uploads/profiles');
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
        $this->sendPasswordSetupMail($user);

        return redirect()->route('usuarios')->with(
            'status',
            'Se envio un nuevo enlace para definir la contrasena a ' . $user->email . '.'
        );
    }

    private function sendPasswordSetupMail(User $user): void
    {
        $resetToken = Password::broker()->createToken($user);
        $resetUrl = route('password.setup', [
            'token' => $resetToken,
            'email' => $user->email,
        ]);

        Mail::to($user->email)->send(new UserWelcomeSetPasswordMail($user, $resetUrl));
    }
}
