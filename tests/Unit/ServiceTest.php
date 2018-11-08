<?php

namespace Tests\Unit;

use Mdcass\RouteDoc\RouteDocService;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    public function testExample()
    {
        app(RouteDocService::class);

        $response = $this->get(config('route-doc.uri'));
        $response->assertStatus(200);
    }
}
