<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    'email' => 'El campo :attribute debe ser un correo válido.',
    'size' => 'El campo :attribute debe tener :size caracteres.',
    'min' => [
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],
    'image' => 'El campo :attribute debe ser una imagen.',
    'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'max' => [
        'file' => 'El campo :attribute no debe ser mayor a :max kilobytes.',
    ],
    'unique' => 'El :attribute ya ha sido registrado.',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'attributes' => [
        'name' => 'nombre',
        'email' => 'correo electrónico',
        'address' => 'dirección',
        'credit_card' => 'tarjeta de crédito',
        'password' => 'contraseña',
        'password_confirmation' => 'confirmación de contraseña',
        'image' => 'imagen de perfil',
    ],
];
