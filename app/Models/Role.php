<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Desactiva los timestamps (created_at y updated_at) si tu tabla no los tiene
    public $timestamps = false;

    // Define el tipo de dato de la llave primaria
    protected $keyType = 'int';

    // Atributos que se pueden asignar masivamente
    protected $fillable = [
        'id',
        'name',
    ];

    /**
     * Relación: Un rol tiene muchos usuarios
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}