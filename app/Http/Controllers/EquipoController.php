<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EquipoController extends Controller
{
    public function publicPage(): View
    {
        return view('pages.nosotros', [
            'teamMembers' => $this->sortedMembers(),
        ]);
    }

    public function index(): View
    {
        return view('admin.equipo.index', [
            'teamMembers' => $this->sortedMembers(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $payload = $this->validateMember($request, true);

        TeamMember::create([
            'name' => $payload['name'],
            'role' => $payload['role'],
            'description' => $payload['description'],
            'image' => $this->storeImage($request->file('image')),
            'image_webp' => null,
            'display_mode' => $payload['display_mode'],
            'sort_order' => (int) $payload['sort_order'],
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.equipo')
            ->with('status', 'Integrante agregado correctamente.');
    }

    public function update(Request $request, string $memberId): RedirectResponse
    {
        $payload = $this->validateMember($request, false);
        $member = TeamMember::query()->find($memberId);

        if (!$member) {
            return redirect()
                ->route('admin.equipo')
                ->withErrors('No se encontro el integrante seleccionado.');
        }

        $member->name = $payload['name'];
        $member->role = $payload['role'];
        $member->description = $payload['description'];
        $member->display_mode = $payload['display_mode'];
        $member->sort_order = (int) $payload['sort_order'];
        $member->is_active = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $member->image = $this->storeImage($request->file('image'));
            $member->image_webp = null;
        }

        $member->save();

        return redirect()
            ->route('admin.equipo')
            ->with('status', 'Integrante actualizado correctamente.');
    }

    public function destroy(string $memberId): RedirectResponse
    {
        $member = TeamMember::query()->find($memberId);

        if ($member) {
            $member->delete();
        }

        return redirect()
            ->route('admin.equipo')
            ->with('status', 'Integrante eliminado correctamente.');
    }

    private function validateMember(Request $request, bool $isCreate): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'role' => ['required', 'string', 'max:120'],
            'description' => ['required', 'string', 'max:500'],
            'image' => $isCreate
                ? ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096']
                : ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'display_mode' => ['required', 'in:picture,art'],
            'sort_order' => ['required', 'integer', 'min:1', 'max:999'],
        ]);
    }

    private function storeImage($image): string
    {
        $directory = public_path('img/equipo');

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
        $image->move($directory, $filename);

        return url('img/equipo/' . $filename);
    }

    private function sortedMembers(): Collection
    {
        if (!Schema::hasTable('team_members')) {
            return collect();
        }

        return TeamMember::query()
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get()
            ->map(fn (TeamMember $member) => $member->toArray())
            ->values();
    }
}
