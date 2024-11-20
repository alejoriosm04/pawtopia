<?php

return [
    'required' => 'The :attribute field is required.',
    'email' => 'The :attribute must be a valid email address.',
    'size' => 'The :attribute must be :size characters.',
    'min' => [
        'string' => 'The :attribute must be at least :min characters.',
    ],
    'image' => 'The :attribute must be an image.',
    'mimes' => 'The :attribute must be a file of type: :values.',
    'max' => [
        'file' => 'The :attribute may not be greater than :max kilobytes.',
    ],
    'unique' => 'The :attribute has already been taken.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'attributes' => [
        'name' => 'name',
        'email' => 'email address',
        'address' => 'address',
        'credit_card' => 'credit card',
        'password' => 'password',
        'password_confirmation' => 'password confirmation',
        'image' => 'profile image',
    ],
];
