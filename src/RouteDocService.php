<?php

namespace Mdcass\RouteDoc;

use Illuminate\Config\Repository as Config;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;

class RouteDocService
{
    /**
     * @var Router
     */
    private $router;

    /**
     * @var array
     */
    private $config;

    /**
     * RouteDocService constructor.
     * @param Router $router
     * @param array $config
     */
    public function __construct(Router $router, array $config)
    {
        $this->router = $router;
        $this->config = $config;
    }

    /**
     * @return \Illuminate\Routing\RouteCollection|Route[]
     */
    public function listRoutes()
    {
        return array_filter($this->router->getRoutes()->getRoutes(), function (Route $route) {
            return starts_with($route->uri(), config('route-doc.uri-segments'));
        });
    }
}
