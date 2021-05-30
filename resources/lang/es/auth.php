<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'   => 'Estas credenciales no coinciden con nuestros registros.',
    'throttle' => 'Demasiados intentos de acceso. Por favor intente nuevamente en :seconds segundos.',

    'registro'=>[
        'name'=>[
            'required'=>'Nombre de usuario no válido.',
            'max'=>'Nombre de usuario debe tener un máximo de :max carácteres.',
            'unique'=>'El nombre de usuario ya existe.'
        ],
        'user_type'=>[
            'required'=>'Tipo de usuario no válido',
            'exists'=>'Tipo de usuario no existe.',
        ],
        'personal'=>[
            'required'=>'Personal seleccionado no válido',
            'exists'=>'El Personal seleccionado no existe.',
            'unique'=>'El Personal seleccionado ya cuenta con un usuario.',
        ],
        'status'=>[
            'boolean'=>'El estado del usuario deber ser activo o inactivo.',
        ],
    ],
];
