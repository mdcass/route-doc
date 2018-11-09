<?php

namespace Tests\Feature\Resources;

use Illuminate\Http\Request;
use Mdcass\RouteDoc\Http\Resources\Reflector\MethodProfileResource;
use Mdcass\RouteDoc\Reflection\MethodProfile;
use Tests\Fixtures\UserController;
use Tests\TestCase;

class MethodProfileResourceTest extends TestCase
{
    public function testResourceOutput()
    {
        $methodProfile = new MethodProfile(new \ReflectionMethod(UserController::class, 'index'));
        $resource = new MethodProfileResource($methodProfile);

        $this->assertArraySubset([
            'name'    => 'index',
            'summary' => 'Display a listing of the resource',
            'description' => ''
        ], $resource->toArray(new Request()));
    }

    public function testMethodFormRequestClassProfileIncludedWhenAvailable()
    {
        $methodProfile = new MethodProfile(new \ReflectionMethod(UserController::class, 'store'));
        $resource = new MethodProfileResource($methodProfile);

        $this->assertNotNull(array_get($resource->toArray(new Request()), 'request'));
    }
}
