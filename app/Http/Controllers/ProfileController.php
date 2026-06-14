<?php

namespace App\Http\Controllers;

use App\Models\UserSocialLink;
use App\Services\CloudinaryImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Throwable;

class ProfileController extends Controller
{
    public function __construct(private readonly CloudinaryImageService $cloudinary)
    {
    }

    public function show()
    {
        $user = auth()->user()?->load('socialLinks');

        return view('admin.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'imagen' => ['nullable', 'image', 'max:2048'],
            'current_password' => ['nullable', 'required_with:new_password', 'current_password'],
            'new_password' => ['nullable', 'required_with:current_password', 'min:8', 'confirmed'],
            'facebook_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'x_url' => ['nullable', 'url', 'max:255'],
            'youtube_url' => ['nullable', 'url', 'max:255'],
        ]);

        $user = $request->user();
        $user->name = $data['name'];

        if ($request->hasFile('imagen')) {
            try {
                $this->cloudinary->deleteByUrl($user->imagen);
                $user->imagen = $this->cloudinary->uploadFile(
                    $request->file('imagen'),
                    (string) config('services.cloudinary.profile_folder', 'oraleweb/profiles'),
                    'profile'
                );
            } catch (Throwable $exception) {
                return back()
                    ->withInput()
                    ->withErrors(['imagen' => $exception->getMessage()]);
            }
        }

        if (!empty($data['new_password'])) {
            $user->password = Hash::make($data['new_password']);
        }

        $user->save();

        UserSocialLink::updateOrCreate(
            ['user_id' => $user->id],
            [
                'facebook_url' => $data['facebook_url'] ?? null,
                'instagram_url' => $data['instagram_url'] ?? null,
                'linkedin_url' => $data['linkedin_url'] ?? null,
                'x_url' => $data['x_url'] ?? null,
                'youtube_url' => $data['youtube_url'] ?? null,
            ]
        );

        return back()->with('status', 'Perfil actualizado correctamente.');
    }
}
