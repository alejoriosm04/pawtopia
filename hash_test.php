<?php

// Cargar el autoload de Composer
require __DIR__.'/vendor/autoload.php';

// Crear la aplicación de Laravel y su kernel
$app = require_once __DIR__.'/bootstrap/app.php';

use Illuminate\Contracts\Console\Kernel;

// Inicializar la aplicación (kernel)
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

// Ahora ya puedes usar Hash
use Illuminate\Support\Facades\Hash;

// Generar un hash de ejemplo
$password = 'password123';
$hashedPassword = Hash::make($password);

// Mostrar el hash generado
echo "Hash generado: $hashedPassword\n";

// Verificar si la contraseña es correcta
if (Hash::check('password123', $hashedPassword)) {
    echo "La contraseña es correcta\n";
} else {
    echo "La contraseña es incorrecta\n";
}

// Verificar con una contraseña incorrecta
if (Hash::check('wrongpassword', $hashedPassword)) {
    echo "La contraseña incorrecta coincide\n";
} else {
    echo "La contraseña incorrecta no coincide\n";
}
