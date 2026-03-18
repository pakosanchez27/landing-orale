<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
