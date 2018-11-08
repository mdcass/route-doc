<?php

\Route::middleware('web')
    ->namespace('Mdcass\RouteDoc\Http\Controllers')
    ->group(function () {
        \Route::resource(config('route-doc.uri'), 'DocumentationController')->only('index');
    });
