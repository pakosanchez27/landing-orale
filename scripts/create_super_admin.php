<?php

use Illuminate\Support\Facades\Hash;
use App\Models\User;

require __DIR__ . '/../vendor/autoload.php';

// Inicializar la aplicación Laravel para acceder a los modelos y DB
$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$email = 'francisco.sanchez@oraleweb.com';
$password = 'Fa222241060*';

// Usamos updateOrCreate para evitar duplicados
$user = User::updateOrCreate(
    ['email' => $email],
    [
        'name' => 'Francisco Sanchez',
        'password' => Hash::make($password),
        'role_id' => 0, 
        'cargo' => 'CEO'
    ]
);

echo "Usuario listo: {$user->email} (role_id={$user->role_id})\n";