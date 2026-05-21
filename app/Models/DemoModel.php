<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DemoModel extends Model
{
    protected $table = 'demos';
    public $timestamps = false;
    protected $fillable = [
        'imagen',
        'titulo',
        'id_industria',
        'descripcion',
        'link',
        'id_usuario',
        'create_at',
        'update_at'
    ];

    public function industria(): BelongsTo
    {
        return $this->belongsTo(IndustriaModel::class, 'id_industria');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function getImagenUrlAttribute(): ?string
    {
        $image = $this->imagen;

        if (!$image) {
            return null;
        }

        if (Str::startsWith($image, ['http://', 'https://'])) {
            return $image;
        }

        $normalized = ltrim(str_replace('\\', '/', $image), '/');

        if (Str::startsWith($normalized, 'storage/')) {
            return asset($normalized);
        }

        if (Str::startsWith($normalized, 'img/demos/')) {
            return asset($normalized);
        }

        return Storage::disk('public')->url($normalized);
    }
}
