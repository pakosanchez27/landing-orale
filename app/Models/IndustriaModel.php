<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndustriaModel extends Model
{
    protected $table = 'industrias';

    protected $fillable = [
        'nombre', 
        'estado',
        'color',
        'create_date',
        'update_date'
        ];

}
