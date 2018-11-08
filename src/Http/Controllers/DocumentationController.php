<?php

namespace Mdcass\RouteDoc\Http\Controllers;

use Illuminate\Routing\Controller;

class DocumentationController extends Controller
{
    public function index()
    {
        return view('route-doc::index');
    }
}
