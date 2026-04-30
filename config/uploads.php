<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Public Upload Root
    |--------------------------------------------------------------------------
    |
    | Permite guardar archivos en un public root distinto al del proyecto.
    | Ejemplo en hosting compartido:
    | PUBLIC_UPLOADS_PATH=/home/usuario/public_html
    |
    */
    'public_root' => env('PUBLIC_UPLOADS_PATH', public_path()),
];
