<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class, 'industry_id');
    }
}
