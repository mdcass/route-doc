<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Environments
    |--------------------------------------------------------------------------
    |
    | The environments which the package should boot. Accepts a comma separated
    | string e.g. development,staging
    |
    */

    'environment' => env('ROUTE_DOC_ENV', 'development,testing'),

    /*
    |--------------------------------------------------------------------------
    | URI
    |--------------------------------------------------------------------------
    |
    | The URI to use for the documentation. Set to the string 'false' in your
    | .env file will not register the documentation route.
    |
    */

    'uri' => env('ROUTE_DOC_ENV', '/route-docs'),
];
