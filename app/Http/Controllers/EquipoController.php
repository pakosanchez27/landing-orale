<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EquipoController extends Controller
{
    private const STORAGE_PATH = 'team-section.json';

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
        $members = $this->loadMembers();

        $members->push([
            'id' => (string) Str::uuid(),
            'name' => $payload['name'],
            'role' => $payload['role'],
            'description' => $payload['description'],
            'image' => $this->storeImage($request->file('image')),
            'image_webp' => null,
            'display_mode' => $payload['display_mode'],
            'sort_order' => (int) $payload['sort_order'],
            'is_active' => $request->boolean('is_active'),
        ]);

        $this->persistMembers($members);

        return redirect()
            ->route('admin.equipo')
            ->with('status', 'Integrante agregado correctamente.');
    }

    public function update(Request $request, string $memberId): RedirectResponse
    {
        $payload = $this->validateMember($request, false);
        $members = $this->loadMembers();
        $memberIndex = $members->search(fn (array $member) => $member['id'] === $memberId);

        if ($memberIndex === false) {
            return redirect()
                ->route('admin.equipo')
                ->withErrors('No se encontro el integrante seleccionado.');
        }

        $member = $members->get($memberIndex);
        $member['name'] = $payload['name'];
        $member['role'] = $payload['role'];
        $member['description'] = $payload['description'];
        if ($request->hasFile('image')) {
            $member['image'] = $this->storeImage($request->file('image'));
            $member['image_webp'] = null;
        }
        $member['display_mode'] = $payload['display_mode'];
        $member['sort_order'] = (int) $payload['sort_order'];
        $member['is_active'] = $request->boolean('is_active');

        $members->put($memberIndex, $member);
        $this->persistMembers($members);

        return redirect()
            ->route('admin.equipo')
            ->with('status', 'Integrante actualizado correctamente.');
    }

    public function destroy(string $memberId): RedirectResponse
    {
        $members = $this->loadMembers()
            ->reject(fn (array $member) => $member['id'] === $memberId)
            ->values();

        $this->persistMembers($members);

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

        return 'img/equipo/' . $filename;
    }

    private function sortedMembers(): Collection
    {
        return $this->loadMembers()
            ->sortBy([
                ['sort_order', 'asc'],
                ['name', 'asc'],
            ])
            ->values();
    }

    private function loadMembers(): Collection
    {
        if (!Storage::disk('local')->exists(self::STORAGE_PATH)) {
            $this->persistMembers(collect($this->defaultMembers()));
        }

        $decoded = json_decode(Storage::disk('local')->get(self::STORAGE_PATH), true);

        if (!is_array($decoded)) {
            return collect($this->defaultMembers());
        }

        return collect($decoded)->map(function ($member) {
            return [
                'id' => (string) ($member['id'] ?? Str::uuid()),
                'name' => (string) ($member['name'] ?? ''),
                'role' => (string) ($member['role'] ?? ''),
                'description' => (string) ($member['description'] ?? ''),
                'image' => (string) ($member['image'] ?? ''),
                'image_webp' => $member['image_webp'] ?? null,
                'display_mode' => $member['display_mode'] === 'art' ? 'art' : 'picture',
                'sort_order' => (int) ($member['sort_order'] ?? 999),
                'is_active' => (bool) ($member['is_active'] ?? true),
            ];
        });
    }

    private function persistMembers(Collection $members): void
    {
        Storage::disk('local')->put(
            self::STORAGE_PATH,
            json_encode($members->values()->all(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
        );
    }

    private function defaultMembers(): array
    {
        return [
            [
                'id' => 'maria-ramirez',
                'name' => 'Maria Ramirez',
                'role' => 'Direccion de estrategia',
                'description' => 'Define objetivos, propuesta de valor y recorrido comercial para que cada web tenga un papel claro dentro del negocio.',
                'image' => 'img/team.jpg',
                'image_webp' => 'img/team.webp',
                'display_mode' => 'picture',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'id' => 'carlos-mendez',
                'name' => 'Carlos Mendez',
                'role' => 'Diseño UI/UX',
                'description' => 'Convierte necesidades comerciales en interfaces pulidas, contemporáneas y con una lectura visual clara.',
                'image' => 'img/nosotros.jpg',
                'image_webp' => 'img/nosotros.jpg.webp',
                'display_mode' => 'picture',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'id' => 'andrea-torres',
                'name' => 'Andrea Torres',
                'role' => 'Desarrollo web',
                'description' => 'Se encarga de que todo lo diseñado cobre vida con rendimiento, limpieza técnica y buena experiencia en cualquier pantalla.',
                'image' => 'img/nosotros.png',
                'image_webp' => null,
                'display_mode' => 'art',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];
    }
}
