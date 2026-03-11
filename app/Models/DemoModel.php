<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemoModel extends Model
{
    protected $fillable = [
        'imagen',
        'titulo',
        'id_industria',
        'descripcion',
        'link',
        'create_at',
        'update_at'

    ];
}
