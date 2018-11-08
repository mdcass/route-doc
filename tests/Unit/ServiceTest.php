<?php

namespace Tests\Unit;

use Mdcass\RouteDoc\RouteDocService;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    public function testServiceWillListRoutesUnderSegmentConfig()
    {
        \Route::get('/api/service-will-list-routes')->name('tmp-route');

        $routes = app(RouteDocService::class)->listRoutes();

        $simpleRoutes = array_map(function ($route) {
            /** @var $route \Illuminate\Routing\Route */
            return $route->getName();
        }, $routes);

        $this->assertTrue(in_array('tmp-route', $simpleRoutes));
        $this->assertTrue(!in_array('route-docs.index', $simpleRoutes));
    }
}
