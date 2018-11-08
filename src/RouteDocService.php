<?php

namespace Mdcass\RouteDoc;

use Illuminate\Config\Repository as Config;
use Illuminate\Routing\Router;

class RouteDocService
{
    /**
     * @var Router
     */
    private $router;

    /**
     * @var Config
     */
    private $config;

    /**
     * RouteDocService constructor.
     * @param Router $router
     * @param Config $config
     */
    public function __construct(Router $router, Config $config)
    {
        $this->router = $router;
        $this->config = $config;
    }

    /**
     * @return \Illuminate\Routing\RouteCollection|\Illuminate\Routing\Route[]
     */
    public function listRoutes()
    {
        return $this->router->getRoutes();
    }
}
