<?php

namespace Tests\Feature\Resources;

use Illuminate\Http\Request;
use Mdcass\RouteDoc\Http\Resources\Reflector\ClassProfileResource;
use Mdcass\RouteDoc\Profile\Reflection\ControllerProfile;
use Tests\Fixtures\UserController;
use Tests\TestCase;

class ClassProfileResourceTest extends TestCase
{
    /**
     * @throws \ReflectionException
     * @throws \Throwable
     */
    public function testResourceOutput()
    {
        $controllerProfile = new ControllerProfile(new \ReflectionClass(UserController::class));
        $resource = new ClassProfileResource($controllerProfile);

        $this->assertArraySubset([
            'name'        => UserController::class,
            'summary'     => 'Users',
            'description' => '<p>The API Resource for Users</p>'
        ], $resource->toArray(new Request()));
    }
}
